<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
use App\Models\Commentaire;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use Twilio\Rest\Client;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Controller extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index_accueil()
    {
        return view('menu');
    }

    public function errorData()
    {
        return view('errorData');
    }

    public function index_propos()
    {
        return view('autre.propos');
    }

    public function index_commentaire()
    {
        $coms = Commentaire::join('users', 'commentaires.user_id', 'users.id')
                            ->select('commentaires.*','users.name as name', 'users.nom_en as nom_en' ,'users.tel as tel', 'users.tel_en as tel_en', 'users.email as email')
                            ->orderBy('created_at', 'desc')
                            ->get();
        return view('autre.commentaire', ['coms' => $coms]);
    }

    public function commentaire_add(Request $request)
    {
        $text = $request->input('text');

        $com = new Commentaire();
        $com->text = $text;
        $com->user_id = Auth::user()->id;
        $com->save();

        return back()->with('success', 'Commentaire sauvegarder.');
    }

}
