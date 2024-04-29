<!DOCTYPE html>
<html lang="zxx" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link href="images/logo.png" rel="shortcut icon">
    <title>Réinitialisation du mot de passe</title>
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
                            <div class="card-inner text-center">
                                <img height="35%" width="35%" src="{{asset('images/logo.png')}}" alt="">
                            </div>
                        </div>
                        <div class="card pt-0">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head text-center mt-0">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Réinitialisation du mot de passe</h4>
                                    </div>
                                </div>
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
    <script src="{{asset('assets/js/example-toastr0226.js') }}"></script>

    @if (session('error'))
        <script>
            NioApp.Toast("<h5>Erreur</h5><p>{{ session('error') }}.", "error", {position: "top-right"});
        </script>
        {{ session()->forget('error') }}
    @endif
    @if (session('info'))
        <script>
            NioApp.Toast("<h5>Information</h5><p>{{ session('info') }}.", "info", {position: "top-right"});
        </script>
        {{ session()->forget('info') }}
    @endif

    <div class="modal fade" tabindex="-1" id="modalmdp" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <h5 class="nk-modal-title">Traitement en cours</h5>
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

                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    NioApp.Toast("<h5>Information</h5><p>Veuillez saisir une adresse e-mail valide.", "info", {position: "top-right"});
                    return false;
                }

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

                                NioApp.Toast("<h5>Succès</h5><p>Mot de passe envoyé.Veuillez vous connecté a nouveau.", "success", {position: "top-right"});

                            } else {

                                NioApp.Toast("<h5>Alert</h5><p>Aucun compte n'est associé a ce email.", "warning", {position: "top-right"});
                            }

                            $('.modal').modal('hide');
                            $(`#modalmdp`).modal('hide');

                        },
                        error: function() {

                            NioApp.Toast("<h5>Erreur</h5><p>Une erreur s'est produite lors de la vérification de l'email.", "error", {position: "top-right"});

                            $('.modal').modal('hide');
                            $(`#modalmdp`).modal('hide');
                        }
                    });

                } else {

                    NioApp.Toast("<h5>Alert</h5><p>Veuillez saisir votre Email s'il vous plait !!!.", "warning", {position: "top-right"});
                }

            });

        });
    </script>

</html>
