<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use App\Models\User;
use App\Models\Historique_action;
use App\Models\Poste;
use App\Models\Autorisation;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function dashboard()
    {
        if (Auth::check()) {

            return view('add.processus');

        } else {

            return redirect()->route('login');

        }
    }
    
    public function view_login()
    {
        return view('auth.login');
    }

    public function view_register()
    {
        return view('auth.register');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('info', 'Vous avez été déconnecté avec succès.');
    }

    public function auth_user(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            Session::forget('url.intended');

            //Auth::logoutOtherDevices($request->password);
            
            $poste_id = Auth::user()->poste_id;
            $user_id = Auth::user()->id;

            $poste = Poste::find($poste_id);
            if ($poste) {
                session(['user_poste' => $poste]);
            }

            return redirect()->intended(route('index_accueil'));
        }

        return redirect()->back()->withInput(['email' => $request->input('email'), 'password' => $request->input('password')])->with([
            'error_login' => 'L\'authentification a échoué. Veuillez vérifier vos informations d\'identification et réessayer.',
        ]);
    }

    public function add_register(Request $request)
    {
        $user_vrf = User::where('email', $request->email)
                        ->orWhere('tel', $request->tel)
                        ->first();
                        
        if ($user_vrf) {
            if ($user_vrf->email === $request->email) {
                return back()->with('error', 'Email existe déjà.');
            } else {
                return back()->with('error', 'Contact existe déjà.');
            }
        } else {

            $user = User::create([
                'name' => $request->name,
                'nom_en' => $request->nom_en,
                'email' => $request->email,
                'password' => bcrypt($request->password1),
                'matricule' => $request->matricule,
                'tel' => $request->tel,
                'tel_en' => $request->tel_en,
                'prof' => $request->prof,
                'poste_id' => '2',
                'suivi_active' => 'non',
                'fa' => 'non',
            ]);

            if ($user) 
            {
                return redirect()->route('login')->with('success', 'Compte crée avec succés, veuillez-vous connecter.');
            }

        }

        return back()->with('error', 'Echec de la création du compte.');
    }

    public function view_reset_password()
    {
        return view('auth.reset_password');
    }

}
