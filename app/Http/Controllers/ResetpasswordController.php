<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

use Illuminate\Support\Str;

class ResetpasswordController extends Controller
{
    public function verif_email($email)
    {
        // Find user by email
        $user = User::where('email', $email)->first();

        if ($user) {

            $password = Str::random(10);
            // Vérifie si le mot de passe contient au moins une lettre majuscule, une lettre minuscule et un chiffre
            while (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
                $password = Str::random(10); // Génère un nouveau mot de passe si les critères ne sont pas satisfaits
            }
            $pass = bcrypt($password);
            // Check if a verification code already exists for the user
            $user->password = $pass;
            $user->save();
            // Return the number of users found (should be 1) and the generated verification code
            $mail = new PHPMailer(true);
            $mail->isHTML(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'coherencemail01@gmail.com';
            $mail->Password = 'kiur ejgn ijqt kxam';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            // Destinataire, sujet et contenu de l'email
            $mail->setFrom('coherencemail01@gmail.com', 'Coherence');
            $mail->addAddress($user->email);
            $mail->Subject = "Nouveau mot de passe généré";
            $mail->Body = 'Cher/Chère '. $user->name .' ! <br><br>'.'<br>'
                        . 'Vous avez oublié votre mot de passe, pas de panique <br>'
                        . 'Nous avons généré un mot de passe qui vous permettra de récupéré votre compte, veuillez utiliser le nouveau Mot de passe ci-dessous :<br>'
                        . 'Mot de passe : '. $password .'<br>'
                        . 'NB : Une fois connecté, Vous avez la possibilié de soite modifier le mot de passe dans les paramétre de sécurité ou conserver le mot de passe généré.';
            // Envoi de l'email
            $mail->send();
            
            return response()->json([
                'user' => 1,
            ]);

        } else {
            // If no user found with the given email
            return response()->json([
                'user' => 0,
            ]);
        }
    }
}
