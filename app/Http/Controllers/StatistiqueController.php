<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Processuse;
use App\Models\Objectif;
use App\Models\Risque;
use App\Models\Cause;
use App\Models\Rejet;
use App\Models\Action;
use App\Models\Suivi_action;
use App\Models\Pdf_file;
use App\Models\User;
use App\Models\Historique_action;
use App\Models\Poste;
use App\Models\Amelioration;
use App\Models\Suivi_amelioration;
use App\Models\Color_para;
use App\Models\Color_interval;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class StatistiqueController extends Controller
{

    public function index_stat()
    {
        $processus = Processuse::where('user_id',  Auth::user()->id)->get();
        $risques = Risque::where('page', 'risk')->where('user_id',  Auth::user()->id)->get();
        $nbre_processus = $processus->count();
        $nbre_risque = $risques->count();
        $nbre_cause = Cause::join('risques', 'causes.risque_id', '=', 'risques.id')
                            ->where('causes.page', 'risk')
                            ->where('risques.user_id',  Auth::user()->id)
                            ->count();

        $nbre_am = Amelioration::where('user_id',  Auth::user()->id)->count();
        $nbre_am_nci = Amelioration::where('type', '=', 'non_conformite_interne')->where('user_id',  Auth::user()->id)->count();
        $nbre_am_r = Amelioration::where('type', '=', 'reclamation')->where('user_id',  Auth::user()->id)->count();
        $nbre_am_c = Amelioration::where('type', '=', 'contentieux')->where('user_id',  Auth::user()->id)->count();

        $types = ['non_conformite_interne', 'reclamation', 'contentieux'];

        $statistics = [];

        $nbre = 0;

        foreach ($types as $type) {
            $statistics[$type] = [];

            $statistics[$type]['total'] = Amelioration::where('ameliorations.type', $type)->where('user_id',  Auth::user()->id)->count();

            $statistics[$type]['causes'] = Amelioration::where('ameliorations.type', $type)->where('user_id',  Auth::user()->id)->where('choix_select', 'cause')->count();

            $statistics[$type]['risques'] = Amelioration::where('ameliorations.type', $type)->where('user_id',  Auth::user()->id)->where('choix_select', 'risque')->count();
                
            $statistics[$type]['causes_risques_nt'] = Amelioration::where('ameliorations.type', $type)->where('user_id',  Auth::user()->id)->where('choix_select', 'cause_risque_nt')->count();

            if($nbre_am > 0){

                $nbre = Amelioration::where('type', $type)->count();
                $statistics[$type]['progres'] = ($nbre / $nbre_am) * 100;
                $statistics[$type]['progres'] = number_format($statistics[$type]['progres'], 2);
                
            }else{

                $statistics[$type]['progres'] = 0;

            }
        }
        
        $nbre_ap = Action::join('risques', 'actions.risque_id', '=', 'risques.id')
                        ->where('actions.type', 'preventive')
                        ->where('risques.statut', 'valider')
                        ->where('risques.user_id',  Auth::user()->id)
                        ->count();

        $nbre_ed_ap = Suivi_action::join('actions', 'actions.id', '=', 'suivi_actions.action_id')
                                    ->join('risques', 'risques.id', '=', 'actions.risque_id')
                                    ->where('suivi_actions.statut', 'realiser')
                                    ->where('risques.user_id',  Auth::user()->id)
                                    ->where('actions.date', '>=', 'suivi_actions.date_action')
                                    ->count();

        $nbre_ehd_ap = Suivi_action::join('actions', 'actions.id', '=', 'suivi_actions.action_id')
                                    ->join('risques', 'risques.id', '=', 'actions.risque_id')
                                    ->where('suivi_actions.statut', 'realiser')
                                    ->where('risques.user_id',  Auth::user()->id)
                                    ->where('actions.date', '<', 'suivi_actions.date_action')
                                    ->count();

        $nbre_hd_ap = Suivi_action::join('actions', 'actions.id', '=', 'suivi_actions.action_id')
                                    ->join('risques', 'risques.id', '=', 'actions.risque_id')
                                    ->where('suivi_actions.statut', '=', 'non-realiser')
                                    ->where('risques.user_id',  Auth::user()->id)
                                    ->count();



        $nbre_ac = Action::join('risques', 'risques.id', '=', 'actions.risque_id')
                        ->where('actions.type', 'corrective')
                        ->where('risques.user_id',  Auth::user()->id)
                        ->where('actions.page', 'risk')
                        ->count();

        $risques_limit = Risque::where('page', '=', 'risk')
                                ->where('user_id',  Auth::user()->id)
                                ->inRandomOrder()
                                ->limit(3)
                                ->get();

        foreach ($risques_limit as $risque_limit) {        

            if($nbre_am > 0){

                $risque_limit->nbre = Amelioration::where('risque_id', $risque_limit->id)
                                                    ->where('choix_select', 'risque')
                                                    ->count();
                $risque_limit->progess = ($risque_limit->nbre / $nbre_am) * 100;
                $risque_limit->progess = number_format($risque_limit->progess, 2);
                
            }else{

                $risque_limit->progess = 0;

            }

        }

        $risques_limit = $risques_limit->sortByDesc('progess');

        $color_para = Color_para::where('nbre0', '=', '0')->first();
        $color_intervals = Color_interval::orderBy('nbre1', 'asc')->get();
        $color_interval_nbre = count($color_intervals);

        return view('statistique.index', ['statistics' => $statistics, 'processus' => $processus, 'nbre_processus' => $nbre_processus, 'nbre_risque' => $nbre_risque, 'nbre_cause' => $nbre_cause, 'nbre_ap' => $nbre_ap, 'nbre_am' => $nbre_am, 'nbre_ed_ap' => $nbre_ed_ap,'nbre_ehd_ap' => $nbre_ehd_ap,'nbre_hd_ap' => $nbre_hd_ap , 'nbre_ac' => $nbre_ac, 'risques' => $risques, 'risques_limit' => $risques_limit, 'color_para' => $color_para, 'color_intervals' => $color_intervals, 'color_interval_nbre' => $color_interval_nbre, 'nbre_am_nci' => $nbre_am_nci, 'nbre_am_r' => $nbre_am_r, 'nbre_am_c' => $nbre_am_c,]);
    }

    public function get_processus($id)
    {
        $types = ['non_conformite_interne', 'reclamation', 'contentieux'];
        $nbres = [];

        foreach ($types as $type) {
            $nbres[$type] = amelioration::join('risques', 'ameliorations.risque_id', 'risques.id')
                                            ->join('processuses', 'risques.processus_id', 'processuses.id')
                                            ->where('risques.page', 'risk')
                                            ->where('ameliorations.type', $type)
                                            ->where('processuses.id', $id)
                                            ->count();
        }

        return response()->json([
            'data' => array_values($nbres),
        ]);
    }

    public function get_risque($id)
    {
        $types = ['non_conformite_interne', 'reclamation', 'contentieux'];
        $nbres = [];

        foreach ($types as $type) {
            $nbres[$type] = amelioration::where('type', $type)
                                            ->where('risque_id', $id)
                                            ->count();
        }

        return response()->json([
            'data' => array_values($nbres),
        ]);
    }

    public function get_date(Request $request)
    {
        $date1 = Carbon::parse($request->input('date1'))->format('Y-m-d');
        $date2 = Carbon::parse($request->input('date2'))->format('Y-m-d');

        $types = ['non_conformite_interne', 'reclamation', 'contentieux'];
        $nbres = [];

        foreach ($types as $type) {
            $nbres[$type] = Amelioration::where('ameliorations.date_fiche', '>=', $date1)
                                        ->where('ameliorations.date_fiche', '<=', $date2)
                                        ->where('ameliorations.type', $type)
                                        ->where('ameliorations.user_id',  Auth::user()->id)
                                        ->count();
        }

        return response()->json([
            'data' => array_values($nbres),
        ]);
    }
}
