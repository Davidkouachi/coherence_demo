<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use App\Models\User;
use App\Models\Historique_action;
use App\Models\Poste;
use App\Models\Autorisation;
use App\Models\Processuse;
use App\Models\Objectif;
use App\Models\Resva;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class UserController extends Controller
{
    public function index_user()
    {
        $postes = Poste::where('occupe', 'non')->get();
        return view('add.res-va', ['postes' => $postes]);
    }

    public function add_register(Request $request)
    {
        dd($request->all());
    }
}
