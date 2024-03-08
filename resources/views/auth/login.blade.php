<!DOCTYPE html>
<html lang="zxx" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link href="images/logo.png" rel="shortcut icon">
    <title>Login</title>
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
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-user bg-primary"></em>
                        </div>
                        <div class="card pt-0">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head text-center">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Utilisateur</h4>
                                    </div>
                                </div>
                                <form id="login" action="/auth_user" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email') }}" placeholder="Entrer votre email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Mot de passe</label>
                                            <a class="link link-primary link-sm" href="{{ route('reset_password') }}">Mot de passe oublié ?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" value="{{ old('password') }}" name="password" class="form-control form-control-lg" id="password" placeholder="Entrer votre Mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-success btn-block">Connexion</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4">
                                    Vous n'avez pas de compte démo ? 
                                    <a href="{{route('register')}}">Créer un compte</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/bundle0226.js')}}"></script>
    <script src="{{asset('assets/js/scripts0226.js')}}"></script>
    <script src="{{asset('assets/js/demo-settings0226.js')}}"></script>

    <link href="{{asset('notification/toastr.min.css')}}" rel="stylesheet">
    <script src="{{asset('notification/toastr.min.js')}}"></script>

    <script>
        document.getElementById("login").addEventListener("submit", function(event) {
            event.preventDefault(); // Empêche la soumission par défaut du formulaire

            // Récupération des valeurs des champs
            var email = document.getElementById("email").value;
            var password1 = document.getElementById("password").value;

            // Validation des champs
            if (!email || !password1 ) {
                toastr.warning("Veuillez remplir tous les champs.");
                return false;
            }

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expression régulière pour valider l'e-mail
            if (!emailRegex.test(email)) {
                toastr.info("Veuillez saisir une adresse e-mail valide.");
                return false;
            }

            // Si toutes les validations passent, soumettre le formulaire
            this.submit();
        });
    </script>

    @if (session('error_login'))
        <script>
            toastr.error("{{ session('error_login') }}"," ",
            {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
            preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
            showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
        </script>
        {{ session()->forget('error_login') }}
    @endif
    @if (session('info'))
        <script>
            toastr.info("{{ session('info') }}"," ",
            {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
            preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
            showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
        </script>
        {{ session()->forget('info') }}
    @endif

</html>
