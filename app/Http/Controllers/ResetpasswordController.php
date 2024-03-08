<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Events\NotificationAcorrective;
use App\Events\NotificationAmnew;

use App\Models\Processuse;
use App\Models\Objectif;
use App\Models\Resva;
use App\Models\Risque;
use App\Models\Cause;
use App\Models\Rejet;
use App\Models\Action;
use App\Models\Suivi_action;
use App\Models\Suivi_amelioration;
use App\Models\Poste;
use App\Models\User;
use App\Models\Amelioration;
use App\Models\Causetrouver;
use App\Models\Risquetrouver;
use App\Models\Historique_action;
use App\Models\Color_para;
use App\Models\Color_interval;
use App\Models\Code_password;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ResetpasswordController extends Controller
{
    public function verif_email($email)
    {
        // Find user by email
        $user = User::where('email', $email)->first();

        if ($user) {
            // Generate a verification code
            $verif_code = rand(100, 999) . '-' . rand(100, 999);

            // Check if a verification code already exists for the user
            $code = Code_password::where('user_id', $user->id)->first();
            
            if ($code) {
                // If a code exists, update it
                $code->code = $verif_code;
                $code->save();
            } else {
                // If no code exists, create a new one
                $vcode = Code_password::where('code', $verif_code)->first();
                if ($vcode) {

                    $verif_code = rand(100, 999) . '-' . rand(100, 999);

                    $new_code = new Code_password();
                    $new_code->user_id = $user->id;
                    $new_code->code = $verif_code;
                    $new_code->save();
                    
                }else {

                    $new_code = new Code_password();
                    $new_code->user_id = $user->id;
                    $new_code->code = $verif_code;
                    $new_code->save();

                }
                
            }
            
            // Return the number of users found (should be 1) and the generated verification code
            return response()->json([
                'nbre_user' => 1,
                'verif_code' => $verif_code,
            ]);
        } else {
            // If no user found with the given email
            return response()->json([
                'nbre_user' => 0,
                'verif_code' => 0,
            ]);
        }
    }

    public function verif_code($code)
    {
        $verif_code = Code_password::where('code', $code)->first();

        if ($verif_code) {
            return response()->json([
                'verif_code' => 1,
            ]);
        } else {

           return response()->json([
                'verif_code' => 0,
            ]); 
        } 
        
    }
}
