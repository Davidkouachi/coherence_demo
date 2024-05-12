<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use App\Models\User;
use App\Models\Poste;
use App\Models\Processuse;
use App\Models\Risque;
use App\Models\Amelioration;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Support\Facades\Session;

class ListeuserController extends Controller
{
    public function index_liste_user()
    {
        $users = User::join('postes', 'users.poste_id', 'postes.id')
                        ->where('postes.nom', 'demo')
                        ->select('users.*', 'postes.nom as poste')
                        ->get();

        foreach($users as $user)
        {
            $user->nbre_processus = Processuse::where('user_id', $user->id)->count();
            $user->nbre_risque = Risque::where('user_id', $user->id)->count();
            $user->nbre_incident = Amelioration::where('user_id', $user->id)->count();
        }

        return view('liste.users', ['users' => $users,]);
    }
}
