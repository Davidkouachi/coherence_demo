<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="utf-8">
    <link href="images/logo.png" rel="shortcut icon">
    <title>Création de compte</title>
    <link rel="stylesheet" href="{{asset('../../assets/css/dashlite0226.css')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('../../assets/css/theme0226.css')}}">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-0 text-center">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-user-add bg-primary"></em>
                        </div>
                        <div class="card pt-0">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head text-center">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Nouveau Compte</h4>
                                    </div>
                                </div>
                                <form id="registration-form" action="/add_register" method="post" >
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" >Nom et prénoms</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" name="name" placeholder="Entrer votre nom et prénoms" id="name"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" >Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control form-control-lg" id="email-address" name="email" placeholder="Entrer votre email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" >Contact</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="tel" class="form-control form-control-lg" name="tel" placeholder="Entrer votre Contact" id="tel">
                                        </div>
                                        <script>
                                            var inputElement = document.getElementById('tel');
                                            inputElement.addEventListener('input', function() {
                                                // Supprimer tout sauf les chiffres
                                                this.value = this.value.replace(/[^0-9]/g, '');

                                                // Limiter la longueur à 10 caractères
                                                if (this.value.length > 10) {
                                                    this.value = this.value.slice(0, 10);
                                                }
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Mot de passe</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="password1" class="form-control form-control-lg" id="password" placeholder="Entrer votre Mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Confirmer le mot de passe</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password2">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="password2" class="form-control form-control-lg" id="password2" placeholder="Confirmer votre Mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" >Identifiant</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input placeholder="l'identifiant est génerer automatiquement" id="matricule" readonly type="text" class="form-control form-control-lg" name="matricule"></div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-success btn-block">
                                            S'inscrire
                                        </button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4">
                                    Vous avez dèjà un compte démo ? 
                                    <a href="{{route('login')}}">Se connecter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function generateMatricule(length) {
          const charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
          let matricule = "";
          for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            matricule += charset.charAt(randomIndex);
          }
          return matricule;
        }

        document.addEventListener("DOMContentLoaded", function () {
          const nameInput = document.querySelector('#name');
          const matriculeInput = document.querySelector('#matricule');
          nameInput.addEventListener('input', function () {
            const matricule = generateMatricule(10);
            matriculeInput.value = matricule;
          });
        });
    </script>

    <script>
        document.getElementById("registration-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Empêche la soumission par défaut du formulaire

            // Récupération des valeurs des champs
            var name = document.getElementById("name").value;
            var email = document.getElementById("email-address").value;
            var tel = document.getElementById("tel").value;
            var password1 = document.getElementById("password").value;
            var password2 = document.getElementById("password2").value;

            // Validation des champs
            if (!name || !email || !tel || !password1 || !password2 ) {
                toastr.warning("Veuillez remplir tous les champs.");
                return false;
            }

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expression régulière pour valider l'e-mail
            if (!emailRegex.test(email)) {
                toastr.info("Veuillez saisir une adresse e-mail valide.");
                return false;
            }

            if (password1 !== password2) {
                toastr.error("Les mots de passe ne correspondent pas.");
                return false;
            }
            
            if (password1 === password2) {
                // Vérification si le mot de passe satisfait les critères
                if (!verifierMotDePasse(password1) || !verifierMotDePasse(password2) ) {
                    // Afficher un message d'erreur
                    toastr.info("Le mot de passe doit comporter au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre.");
                    return false;
                }

            }

            // Si toutes les validations passent, soumettre le formulaire
            this.submit();

            function verifierMotDePasse(motDePasse) {
                // Vérification de la longueur
                if (motDePasse.length < 8) {
                    return false;
                }

                // Vérification s'il contient au moins une lettre majuscule
                if (!/[A-Z]/.test(motDePasse)) {
                    return false;
                }

                // Vérification s'il contient au moins une lettre minuscule
                if (!/[a-z]/.test(motDePasse)) {
                    return false;
                }

                // Vérification s'il contient au moins un chiffre
                if (!/\d/.test(motDePasse)) {
                    return false;
                }

                // Si toutes les conditions sont satisfaites, le mot de passe est valide
                return true;
            }

        });
    </script>

    <script src="{{asset('assets/js/bundle0226.js')}}"></script>
    <script src="{{asset('assets/js/scripts0226.js')}}"></script>
    <script src="{{asset('assets/js/demo-settings0226.js')}}"></script>
    <link href="{{asset('notification/toastr.min.css')}}" rel="stylesheet">
    <script src="{{asset('notification/toastr.min.js')}}"></script>

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}"," ",
            {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
            preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
            showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
        </script>
        {{ session()->forget('error') }}
    @endif

</html>
