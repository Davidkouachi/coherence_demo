<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use App\Models\User;
use App\Models\Poste;

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
                        ->whereIn('postes.nom', ['demo', 'pro'])
                        ->select('users.*', 'postes.nom as poste')
                        ->get();

        return view('liste.users', ['users' => $users,]);
    }
}
