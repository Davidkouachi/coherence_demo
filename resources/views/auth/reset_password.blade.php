<!DOCTYPE html>
<html lang="zxx" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link href="images/logo.png" rel="shortcut icon">
    <title>Réinitialisatio du mot de passe</title>
    <link rel="stylesheet" href="{{asset('../../assets/css/dashlite0226.css')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('../../assets/css/theme0226.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-0 text-center">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-lock-alt bg-primary"></em>
                        </div>
                        <div class="card pt-0">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Réinitialiser le mot de passe</h5>
                                        <div class="nk-block-des">
                                            <p>Si vous avez oublié votre mot de passe, nous vous enverrons par e-mail des instructions pour réinitialiser votre mot de passe.</p>
                                        </div>
                                    </div>
                                </div>

                                <div id="cadre_email" style="display:none;">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Entrer votre Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button id="btn_email" class="btn btn-lg btn-primary btn-dim btn-block">Envoie du code de vérification</button>
                                    </div>
                                </div>

                                <div id="cadre_verification" style="display:none;">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Code de Vérification</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="code" name="code" placeholder="Entrer le code de vérification">
                                            <script>
                                                var inputElement = document.getElementById('code');
                                                inputElement.addEventListener('input', function() {
                                                    // Remove anything except digits
                                                    this.value = this.value.replace(/\D/g, '');

                                                    // Format as XXX-XXX
                                                    if (this.value.length > 3) {
                                                        this.value = this.value.substring(0, 3) + '-' + this.value.substring(3, 6);
                                                    }

                                                    // Limit the length to 7 characters (including the hyphen)
                                                    if (this.value.length > 7) {
                                                        this.value = this.value.substring(0, 7);
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button id="btn_verification" class="btn btn-lg btn-warning btn-dim btn-block">Verification du code</button>
                                    </div>
                                </div>

                                <div id="cadre_password" style="display:none;">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Mot de passe</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Entrer votre Mot de passe">
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
                                        <button id="btn_password" class="btn btn-lg btn-success btn-dim btn-block">
                                            Modifier
                                        </button>
                                    </div>
                                </div>

                                <div class="form-note-s2 text-center pt-4">
                                    <a id="btn_login" href="{{route('login')}}"><strong>Se connecter</strong></a>
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

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}"," ",
            {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
            preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
            showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
        </script>
        {{ session()->forget('error') }}
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            event.preventDefault();
            // Check if the user has made a choice before
            var isVerificationDisplayed = localStorage.getItem('verification_displayed');
            var isVerificationEmail = localStorage.getItem('Email');
            var isVerificationCode = localStorage.getItem('Code');

            localStorage.setItem('verification_displayed', 'email');

            // If the verification was displayed before, hide the email section and show the verification section
            if (isVerificationDisplayed === 'email') {
                document.getElementById("cadre_email").style.display = "block";
                document.getElementById("cadre_verification").style.display = "none";
                document.getElementById("cadre_password").style.display = "none";
            } else if (isVerificationDisplayed === 'verification') {
                // Otherwise, show the email section and hide the verification section
                document.getElementById("cadre_email").style.display = "none";
                document.getElementById("cadre_verification").style.display = "block";
                document.getElementById("cadre_password").style.display = "none";
            } else if (isVerificationDisplayed === 'password') {
                // Otherwise, show the email section and hide the verification section
                document.getElementById("cadre_email").style.display = "none";
                document.getElementById("cadre_verification").style.display = "none";
                document.getElementById("cadre_password").style.display = "block";
            }

            // When the email button is clicked
            document.getElementById("btn_email").addEventListener("click", function(event) {
                event.preventDefault();
                localStorage.setItem('verification_displayed', 'email');
                const email = document.getElementById("email").value;

                if (email !== '') {

                    $.ajax({
                        url: '/Verification_email/' + email,
                        method: 'GET',
                        success: function(data) {
                            var nbre_user = data.nbre_user;
                            var verif_code = data.verif_code;

                            if (nbre_user === 1) {

                                toastr.info("Un code de vérification a été envoyé.");

                                // Hide the email section and show the verification section
                                document.getElementById("cadre_email").style.display = "none";
                                document.getElementById("cadre_verification").style.display = "block";
                                document.getElementById("cadre_password").style.display = "none";

                                // Store the choice in local storage
                                localStorage.setItem('Email', email);
                                localStorage.setItem('Code', verif_code);
                                localStorage.setItem('verification_displayed', 'verification');

                            } else {
                                toastr.info("Aucun compte n'est associé a ce email");
                            }

                        },
                        error: function() {
                            toastr.error("Une erreur s'est produite lors de la vérification de l'email.");
                        }
                    });

                } else {
                    toastr.warning(" Veuillez saisir votre Email s'il vous plait !!!");
                }

            });

            // When the verification button is clicked
            document.getElementById("btn_verification").addEventListener("click", function(event) {
                event.preventDefault();
                localStorage.setItem('verification_displayed', 'verification');
                const code = document.getElementById("code").value;

                if (code !== '') {

                    if (isVerificationCode === code) {

                        toastr.success("Entrer votre nouveau mot de passe.");

                        document.getElementById("cadre_email").style.display = "none";
                        document.getElementById("cadre_verification").style.display = "none";
                        document.getElementById("cadre_password").style.display = "block";

                        localStorage.setItem('verification_displayed', 'password');

                    } else {

                        toastr.error("Code de vérification incorrecte");
                        
                    }

                } else {

                    toastr.warning(" Veuillez saisir le code de vérification s'il vous plait !!!");

                }

                
            });

            document.getElementById("btn_password").addEventListener("click", function() {
                localStorage.setItem('verification_displayed', 'email');

                window.location.href = "{{ route('login') }}";
            });

            document.getElementById("btn_login").addEventListener("click", function() {
                localStorage.setItem('verification_displayed', 'email');
            });

        });
    </script>

</html>
