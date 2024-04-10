<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Events\NotificationAcorrective;
use App\Events\NotificationApreventive;
use App\Events\NotificationAnon;
use App\Events\NotificationProcessus;
use App\Events\NotificationRisque;
use App\Events\NotificationAup;

use App\Models\Processuse;
use App\Models\Objectif;
use App\Models\Risque;
use App\Models\Cause;
use App\Models\Rejet;
use App\Models\Action;
use App\Models\Suivi_action;
use App\Models\Pdf_file;
use App\Models\Pdf_file_processus;
use App\Models\User;
use App\Models\Historique_action;
use App\Models\Poste;
use App\Models\Color_para;
use App\Models\Color_interval;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use Twilio\Rest\Client;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RisqueController extends Controller
{
    public function index_risque()
    {

        $processuses = Processuse::where('user_id',  Auth::user()->id)->get();
        $postes = Poste::where('occupe', 'oui')->get();
                        
        $color_para = Color_para::where('nbre0', '=', '0')->first();
        $color_intervals = Color_interval::orderBy('nbre1', 'asc')->get();
        $color_interval_nbre = count($color_intervals);

        $pdfFiles = Pdf_file::all();
        $pdfFiles2 = Pdf_file_processus::all();

        $block = null;

        if (session('user_poste')->nom == 'demo') {

            $nbre = risque::where('user_id', '=', Auth::user()->id )->count();
            if($nbre >= 2){
                $block = 'oui';
            }else{
                $block = 'non';
            }
        }else{
            
            $block = 'non';
        }

        return view('add.processuseva', [
            'processuses' => $processuses,
            'postes' => $postes,
            'color_para' => $color_para,
            'color_intervals' => $color_intervals,
            'color_interval_nbre' => $color_interval_nbre,
            'pdfFiles' => $pdfFiles,
            'pdfFiles2' => $pdfFiles2,
            'block' => $block,
        ]);
    }

    public function recherche_processus($processusId)
    {
        $objectifs = Objectif:: where('processus_id', $processusId)->get();
        $nbre = count($objectifs);
        
        return response()->json([
            'objectifs' => $objectifs,
            'nbre' => $nbre
        ]);
    }

    public function add_risque(Request $request)
    {

        $processus_id = $request->input('processus_id');

        $nom_risque = $request->input('nom_risque');
        $vrai = $request->input('vrai');
        $gravite = $request->input('gravite');

        if($request->operation ==='addition'){
            $evaluation = $request->input('vrai') + $request->input('gravite');
        }elseif($request->operation ==='multiplication'){
            $evaluation = $request->input('vrai') * $request->input('gravite');
        }
        

        $cout = $request->input('cout');
        $vrai_residuel = $request->input('vrai_residuel');
        $gravite_residuel = $request->input('gravite_residuel');

        if($request->operation ==='addition'){
            $evaluation_residuel = $request->input('vrai_residuel') + $request->input('gravite_residuel');
        }elseif($request->operation ==='multiplication'){
            $evaluation_residuel = $request->input('vrai_residuel') * $request->input('gravite_residuel');
        }

        $cout_residuel = $request->input('cout_residuel');
        $traitement = $request->input('traitement');
        $validateur = $request->input('poste_id');

        $risque = new Risque();
        $risque->nom = $nom_risque;
        $risque->page = 'risk';
        $risque->vraisemblence = $vrai;
        $risque->gravite = $gravite;
        $risque->evaluation = $evaluation;
        $risque->cout = $cout;
        $risque->vraisemblence_residuel = $vrai_residuel;
        $risque->gravite_residuel = $gravite_residuel;
        $risque->evaluation_residuel = $evaluation_residuel;
        $risque->cout_residuel = $cout_residuel;
        $risque->processus_id = $processus_id;
        $risque->traitement = $traitement;
        $risque->poste_id = $validateur;
        $risque->statut = 'soumis';
        $risque->user_id = Auth::user()->id;
        $risque->save();


        if ($request->hasFile('pdfFile') && $request->file('pdfFile')->isValid()) {

            $originalFileName = $request->file('pdfFile')->getClientOriginalName();
            $pdfPathname = $request->file('pdfFile')->storeAs('public/pdf', $originalFileName);

            // Enregistrez le fichier PDF dans la base de données
            $pdfFile = new Pdf_file();
            $pdfFile->pdf_nom = $originalFileName;
            $pdfFile->pdf_chemin = $pdfPathname;
            $pdfFile->risque_id = $risque->id;
            $pdfFile->save();
        }

        $nom_cause = $request->input('nom_cause');
        $dispositif = $request->input('dispositif');
        $risque_id = $risque->id;

        foreach ($nom_cause as $index => $valeur) {
            $cause = new Cause();
            $cause->nom = $nom_cause[$index];
            $cause->page = 'risk';
            $cause->dispositif = $dispositif[$index];
            $cause->risque_id = $risque_id;
            $cause->save();
        }

        $actionc = $request->input('actionc');
        $actionp = $request->input('actionp');
        $delai = $request->input('delai');
        $responsable_idp = $request->input('poste_idp');
        $responsable_idc = $request->input('poste_idc');

        foreach ($actionp as $index => $valeur) {

            if ($actionp[$index] !== '') {
                
                $nouvelleActionP = new Action();
                $nouvelleActionP->action = $actionp[$index];
                $nouvelleActionP->page = 'risk';
                $nouvelleActionP->poste_id = $responsable_idp[$index];
                $nouvelleActionP->risque_id = $risque_id;
                $nouvelleActionP->date = $delai[$index];
                $nouvelleActionP->type = 'preventive';
                $nouvelleActionP->save();

            }
        }

        foreach ($actionc as $index => $valeur) {

            $nouvelleActionC = new Action();
            $nouvelleActionC->action = $actionc[$index];
            $nouvelleActionC->page = 'risk';
            $nouvelleActionC->poste_id = $responsable_idc[$index];
            $nouvelleActionC->risque_id = $risque_id;
            $nouvelleActionC->type = 'corrective';
            $nouvelleActionC->save();

        }

        if ($risque && $cause && $nouvelleActionP && $nouvelleActionC )
        {

            return back()->with('success', 'Enregistrement éffectuée.');

        }

        return back()->with('error', 'Echec.');
    }

    public function index_validation_risque()
    {
        $risques = Risque::join('postes', 'risques.poste_id', '=', 'postes.id')
                ->where('statut', '!=', 'valider')
                ->where('page', '=', 'risk')
                ->where('user_id',  Auth::user()->id)
                ->select('risques.*','postes.nom as validateur')
                ->get();

        $causesData = [];
        $actionsDatap = [];
        $actionsDatac = [];

        foreach($risques as $risque)
        {
            $risque_pdf = Pdf_file::where('risque_id', $risque->id)->first();
            if ($risque_pdf) {
                $risque->pdf_nom = $risque_pdf->pdf_nom;
            } else {
                // Gérer le cas où aucun enregistrement n'est trouvé
                $risque->pdf_nom = null; // Ou définissez-le comme vous le souhaitez
            }
            
            $processus = Processuse::where('id', $risque->processus_id)->first();
            $risque->nom_processus = $processus->nom;

            $actionsp = Action::join('postes', 'actions.poste_id', '=', 'postes.id')
                ->where('actions.risque_id', $risque->id)
                ->where('actions.type', 'preventive')
                ->select('actions.*','postes.nom as responsable', 'postes.id as poste_id')
                ->get();
            $risque->nbre_actionp = count($actionsp);

            $actionsDatap[$risque->id] = [];
            
            foreach($actionsp as $actionp)
            {
                $actionsDatap[$risque->id][] = [
                    'action_idp' => $actionp->id,
                    'action' => $actionp->action,
                    'date_suivip' => $actionp->date,
                    'responsable' => $actionp->responsable,
                    'poste_idp' => $actionp->poste_id,
                ];
            }

            $actionsc = Action::join('postes', 'actions.poste_id', '=', 'postes.id')
                ->where('actions.risque_id', $risque->id)
                ->where('actions.type', 'corrective')
                ->select('actions.*','postes.nom as responsable', 'postes.id as poste_id')
                ->get();
            $risque->nbre_actionc = count($actionsc);

            $actionsDatac[$risque->id] = [];
            
            foreach($actionsc as $actionc)
            {
                $actionsDatac[$risque->id][] = [
                    'action_idc' => $actionc->id,
                    'action' => $actionc->action,
                    'responsable' => $actionc->responsable,
                    'poste_idc' => $actionc->poste_id,
                ];
            }

            $causes = Cause::where('causes.risque_id', $risque->id)->get();
            $risque->nbre_cause = count($causes);
            
            $causesData[$risque->id] = [];
            
            foreach($causes as $cause)
            {
                $causesData[$risque->id][] = [
                    'cause' => $cause->nom,
                    'dispositif' => $cause->dispositif,
                    'validateur' => $risque->validateur,
                ];
            }
        }

        $color_para = Color_para::where('nbre0', '=', '0')->first();
        $color_intervals = Color_interval::orderBy('nbre1', 'asc')->get();
        $color_interval_nbre = count($color_intervals);

        return view('tableau.validecause', [
            'risques' => $risques, 
            'causesData' => $causesData, 
            'actionsDatap' => $actionsDatap , 
            'actionsDatac' => $actionsDatac, 
            'color_para' => $color_para,
            'color_intervals' => $color_intervals,
            'color_interval_nbre' => $color_interval_nbre,
        ]);
    }

    public function risque_valider($id)
    {
        $valide = Risque::where('id', $id)->first();
        $valide->date_validation = now()->format('Y-m-d\TH:i');
        $valide->statut = 'valider';
        $valide->update();

        if ($valide)
        {
            $rechs = Action::join('risques', 'actions.risque_id', 'risques.id')
                        ->join('processuses', 'risques.processus_id', 'processuses.id')
                        ->where('risques.id', $id)
                        ->where('actions.type', 'preventive')
                        ->select('actions.*','processuses.id as processus_id')
                        ->get();

            if ($rechs) {

                foreach ($rechs as $value) {

                    $rech =Suivi_action::where('action_id', $value->id)->count();

                    if($rech === 0) {

                        $suivip = new Suivi_action();
                        $suivip->statut = 'non-realiser';
                        $suivip->action_id = $value->id;
                        $suivip->save();
                    }
                }
            }

            event(new NotificationApreventive());

            return redirect()
                    ->back()
                    ->with('success', 'Validation éffectuée.');
        }

        return redirect()
            ->back()
            ->with('error', 'Validation a échoué.');
    }

    public function risque_rejet(Request $request)
    {

        $rejet = Rejet::where('risque_id', $request->input('risque_id'))->first();

        if ($rejet)
        {
            $rejet->motif = $request->input('motif');
            $rejet->update();

        } else {

            $rejet = new Rejet();
            $rejet->motif = $request->input('motif');
            $rejet->risque_id = $request->input('risque_id');
            $rejet->save();

        }

        if ($rejet)
        {
            $valide = Risque::where('id', $request->input('risque_id'))->first();
            $valide->statut = 'non_valider';
            $valide->update();

            if ($valide) {

                $his = new Historique_action();
                $his->nom_formulaire = 'Validation fiche risque';
                $his->nom_action = 'Rejet';
                $his->user_id = Auth::user()->id;
                $his->save();

                event(new NotificationAnon());

                return redirect()
                        ->back()
                        ->with('success', 'rejet éffectuée.');
            }
            
        }

        return redirect()
            ->back()
            ->with('error', 'Rejet a échoué.');
    }

}
