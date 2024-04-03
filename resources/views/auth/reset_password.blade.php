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

                                <div id="cadre_email">
                                    <div class="nk-block-des">
                                        <p>
                                            Aprés vérifcation de votre email,Le nouveau mot de passe généré sera envoyé par email.
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Entrer votre Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button id="btn_email" class="btn btn-lg btn-primary btn-dim btn-block">
                                            Envoi du Mot de passe
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

        <div class="modal fade" tabindex="-1" id="modalLoad" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <h5 class="nk-modal-title">Vérification des données</h5>
                            <div class="nk-modal-text">
                                <div class="text-center">
                                    <div class="spinner-border text-warning" role="status"></div>
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

    <div class="modal fade" tabindex="-1" id="modalmdp" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <h5 class="nk-modal-title">Vérification des données</h5>
                            <div class="nk-modal-text">
                                <div class="text-center">
                                    <div class="spinner-border text-warning" role="status"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            event.preventDefault();
            // When the email button is clicked
            document.getElementById("btn_email").addEventListener("click", function(event) {
                event.preventDefault();

                const email = document.getElementById("email").value;

                if (email !== '') {
                    $('.modal').modal('hide');
                    $(`#modalmdp`).modal('hide');
                    $(`#modalmdp`).modal('show');

                    $.ajax({
                        url: '/Verification_email/' + email,
                        method: 'GET',
                        success: function(data) {
                            var user = data.user;

                            if (user === 1) {

                                toastr.info("Veuillez vous connecté a nouveau.");

                            } else {
                                toastr.info("Aucun compte n'est associé a ce email");
                            }

                            $('.modal').modal('hide');
                            $(`#modalmdp`).modal('hide');

                        },
                        error: function() {
                            toastr.error("Une erreur s'est produite lors de la vérification de l'email.");

                            $('.modal').modal('hide');
                            $(`#modalmdp`).modal('hide');
                        }
                    });

                } else {
                    toastr.warning(" Veuillez saisir votre Email s'il vous plait !!!");
                }

            });

        });
    </script>

</html>
