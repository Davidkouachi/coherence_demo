<!DOCTYPE html>
<html class="js" lang="fr">
<meta content="text/html;charset=utf-8" http-equiv="content-type">

<head>
    <meta charset="utf-8">
    <meta content="Softnio" name="author">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers." name="description">
    <link href="images/logo.png" rel="shortcut icon">
    <title>@yield('titre')</title>
    <link href="assets/css/dashlite0226.css?" rel="stylesheet">
    <link href="assets/css/theme0226.css" rel="stylesheet">
    <script src="{{asset('chart.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('pusher.min.js') }}"></script>
    </link>
    </link>
    </link>
    </meta>
    </meta>
    </meta>
    </meta>
</head>

<body class="nk-body bg-lighter ">
    <div class="nk-app-root">
        <div class="nk-wrap ">
            <div class="nk-header is-light nk-header-fixed">
                <div class="container-fluid">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger me-sm-2 d-lg-none">
                            <a class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav" href="#">
                                <em class="icon ni ni-menu"></em>
                            </a>
                        </div>
                        <div class="nk-header-brand">
                            <a class="logo-link" href="{{ route('index_accueil') }}">
                                <img alt="logo-dark" class="logo-dark logo-img" src="images/logo.png"
                                    srcset="/images/logo.png 2x">
                                </img>
                            </a>
                        </div>
                        <div class="nk-header-menu ms-auto" data-content="headerNav">
                            <div class="nk-header-mobile">
                                <div class="nk-header-brand">
                                    <a class="logo-link" href="{{ route('index_accueil') }}">
                                        <img alt="logo-dark" class="logo-dark logo-img" src="images/logo.png"
                                            srcset="/images/logo.png 2x">
                                        </img>
                                        <span><B>COHÉRENCE</B></span>
                                    </a>
                                </div>
                                <div class="nk-menu-trigger me-n2">
                                    <a class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav" href="#">
                                        <em class="icon ni ni-arrow-left"></em>
                                    </a>
                                </div>
                            </div>
                            <ul class="nk-menu nk-menu-main ui-s2">
                                <li class="nk-menu-item ">
                                    <a class="nk-menu-link" href="{{ route('index_stat') }}">
                                        <em class="ni ni-bar-chart-alt me-2"></em>
                                        <span class="nk-menu-text text-dark">
                                            Statistique
                                        </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a class="nk-menu-toggle btn " >
                                        <em class="ni ni-share-alt me-2"></em>
                                        <span class="nk-menu-text text-dark">
                                            Processus
                                        </span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li >
                                            <a class="nk-menu-link" href="{{ route('index_add_processus') }}">
                                                <span class="nk-menu-icon" >
                                                    <em class="icon ni ni-property-add"></em>
                                                </span>
                                                <span class="nk-menu-text ">
                                                    Nouveau processus
                                                </span>
                                            </a>
                                        </li>
                                        <li >
                                            <a class="nk-menu-link" href="{{ route('index_listeprocessus') }}">
                                                <span class="nk-menu-icon" >
                                                    <em class="ni ni-list-index"></em>
                                                </span>
                                                <span class="nk-menu-text ">
                                                    Liste des processus
                                                </span>
                                            </a>
                                        </li>
                                        <li >
                                            <a class="nk-menu-link" @if(session('user_poste')->nom === 'pro') href="{{ route('index_evaluation_processus') }}" @else href="#" @endif >
                                                <span class="nk-menu-icon" >
                                                    <em class="icon ni ni-view-list-sq"></em>
                                                </span>
                                                <span class="nk-menu-text ">
                                                    Tableau d'évaluation
                                                </span>
                                                <span class="nk-menu-badge bg-danger text-white">
                                                    pro
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a class="nk-menu-toggle btn " >
                                        <em class="ni ni-hot-fill me-2"></em>
                                        <span class="nk-menu-text text-dark">
                                            Risques
                                        </span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li >
                                            <a class="nk-menu-link" href="{{ route('index_risque') }}">
                                                <span class="nk-menu-icon" >
                                                    <em class="icon ni ni-property-add"></em>
                                                </span>
                                                <span class="nk-menu-text">
                                                    Nouveau risque
                                                </span>
                                            </a>
                                        </li>
                                        <li >
                                            <a class="nk-menu-link" href="{{ route('index_liste_risque') }}">
                                                <span class="nk-menu-icon" >
                                                    <em class="ni ni-list-index"></em>
                                                </span>
                                                <span class="nk-menu-text">
                                                    Liste des risques
                                                </span>
                                            </a>
                                        </li>
                                        <li >
                                            <a class="nk-menu-link" href="{{ route('index_validation_risque') }}">
                                                <span class="nk-menu-icon" >
                                                    <em class="icon ni ni-view-list-sq"></em>
                                                </span>
                                                <span class="nk-menu-text">
                                                    Tableau de validation
                                                </span>
                                            </a>
                                        </li>
                                        <li >
                                            <a class="nk-menu-link" @if(session('user_poste')->nom === 'pro') href="{{ route('index_risque_actionup') }}" @else href="#" @endif >
                                                <span class="nk-menu-icon" >
                                                    <em class="ni ni-box-view-fill"></em>
                                                </span>
                                                <span class="nk-menu-text">
                                                    Risque non validé
                                                </span>
                                                <span class="nk-menu-badge bg-danger text-white">
                                                    pro
                                                </span>
                                            </a>
                                        </li>
                                        <li >
                                            <a class="nk-menu-link" @if(session('user_poste')->nom === 'pro') href="{{ route('index_color_risk') }}" @else href="#" @endif >
                                                <span class="nk-menu-icon" >
                                                    <em class="ni ni-opt-dot-alt"></em>
                                                </span>
                                                <span class="nk-menu-text me-4">
                                                    Paramètrage des couleurs
                                                </span>
                                                <span class="nk-menu-badge bg-danger text-white">
                                                    pro
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a class="nk-menu-toggle btn " >
                                        <em class="ni ni-alert me-2"></em>
                                        <span class="nk-menu-text text-dark">
                                            Causes
                                        </span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li >
                                            <a class="nk-menu-link" href="{{ route("liste_cause") }}">
                                                <span class="nk-menu-icon" >
                                                    <em class="icon ni ni-property-add"></em>
                                                </span>
                                                <span class="nk-menu-text ">
                                                    Liste des causes
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a class="nk-menu-toggle btn " >
                                        <em class="ni ni-box-view-fill me-2"></em>
                                        <span class="nk-menu-text text-dark">
                                            Actions
                                        </span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item has-sub">
                                            <a class="nk-menu-link nk-menu-toggle" href="#">
                                                <em class="ni ni-box-view-fill me-2"></em>
                                                <span class="nk-menu-text">
                                                    Action Préventive
                                                </span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a class="nk-menu-link" @if(session('user_poste')->nom === 'pro') href="{{ route('index_suiviaction') }}" @else href="#" @endif  >
                                                        <span class="nk-menu-icon" >
                                                            <em class="icon ni ni-view-list-sq"></em>
                                                        </span>
                                                        <span class="nk-menu-text">
                                                            Tableau de suivi
                                                        </span>
                                                        <span class="nk-menu-badge bg-danger text-white">
                                                            pro
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a class="nk-menu-link" href="{{ route('index_ap') }}">
                                                        <span class="nk-menu-icon" >
                                                            <em class="ni ni-list-index"></em>
                                                        </span>
                                                        <span class="nk-menu-text">
                                                            Liste des actions
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nk-menu-item has-sub">
                                            <a class="nk-menu-link nk-menu-toggle" href="#">
                                                <em class="ni ni-box-view-fill me-2"></em>
                                                <span class="nk-menu-text">
                                                    Action Corrective
                                                </span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a class="nk-menu-link" @if(session('user_poste')->nom === 'pro') href="{{ route('index_suiviactionc') }}" @else href="#" @endif  >
                                                        <span class="nk-menu-icon" >
                                                            <em class="icon ni ni-view-list-sq"></em>
                                                        </span>
                                                        <span class="nk-menu-text">
                                                            Tableau de suivi
                                                        </span>
                                                        <span class="nk-menu-badge bg-danger text-white">
                                                            pro
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a class="nk-menu-link" href="{{ route('index_ac') }}">
                                                        <span class="nk-menu-icon" >
                                                            <em class="ni ni-list-index"></em>
                                                        </span>
                                                        <span class="nk-menu-text">
                                                            Liste des actions
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a class="nk-menu-toggle btn " >
                                        <em class="ni ni-share-alt me-2"></em>
                                        <span class="nk-menu-text text-dark">
                                            Incidents
                                        </span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li >
                                            <a class="nk-menu-link" href="{{ route('index_amelioration') }}">
                                                <span class="nk-menu-icon" >
                                                    <em class="icon ni ni-property-add"></em>
                                                </span>
                                                <span class="nk-menu-text ">
                                                    Fiche de résolution d'incident
                                                </span>
                                            </a>
                                        </li>
                                        <li >
                                            <a class="nk-menu-link" href="{{ route('index_amelioration_liste') }}" >
                                                <span class="nk-menu-icon" >
                                                    <em class="ni ni-list-index"></em>
                                                </span>
                                                <span class="nk-menu-text ">
                                                    Suivis des incidents
                                                </span>
                                            </a>
                                        </li>
                                        <li >
                                            <a class="nk-menu-link" href="{{ route('index_validation_amelioration') }}" >
                                                <span class="nk-menu-icon" >
                                                    <em class="ni ni-view-list-sq"></em>
                                                </span>
                                                <span class="nk-menu-text ">
                                                    Tableau de validation
                                                </span>
                                            </a>
                                        </li>
                                        <li >
                                            <a class="nk-menu-link" @if(session('user_poste')->nom === 'pro') href="{{ route('index_amup') }}" @else href="#" @endif  >
                                                <span class="nk-menu-icon" >
                                                    <em class="ni ni-list"></em>
                                                </span>
                                                <span class="nk-menu-text me-4">
                                                    Fiche(s) non validé(s)
                                                </span>
                                                <span class="nk-menu-badge bg-danger text-white">
                                                    pro
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @yield('menu')
                            </ul>
                        </div>
                        <div class="nk-header-tools">
                            <ul class="nk-quick-nav">
                                @yield('option_btn')
                                @if (Auth::check())
                                <li class="dropdown user-dropdown">
                                    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                        <div class="user-toggle">
                                            <div class="user-avatar">
                                                <em class="icon ni ni-user-alt"></em>
                                            </div>
                                            <div class="user-info">
                                                <div class="user-status text-primary"> </div>
                                                <div class="user-name dropdown-indicator">
                                                    {{ Auth::user()->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div
                                        class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1 is-light">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <span>
                                                        <em class="icon ni ni-user-alt"></em>
                                                    </span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">
                                                        {{ Auth::user()->name }}
                                                    </span>
                                                    <span class="sub-text">
                                                        {{ Auth::user()->email }}
                                                    </span>
                                                </div>
                                                <!--<div class="user-action">
                                                    <a class="btn btn-icon me-n2" href="user-profile-setting.html">
                                                        <em class="icon ni ni-setting"></em>
                                                    </a>
                                                </div>-->
                                            </div>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <!--<li>
                                                    <a href="{{ route('index_accueil') }}">
                                                        <em class="icon ni ni-home"></em>
                                                        <span>
                                                            Accueil
                                                        </span>
                                                    </a>
                                                </li>-->
                                                <li>
                                                    <a href="{{ route('index_profil') }}">
                                                        <em class="icon ni ni-user-alt"></em>
                                                        <span>
                                                            Voir Profil
                                                        </span>
                                                    </a>
                                                </li>
                                                <!--<li>
                                                    <a>
                                                        <em class="icon ni ni-activity-alt"></em>
                                                        <span>
                                                            Activité
                                                        </span>
                                                    </a>
                                                </li>-->
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li>
                                                    <a href="{{ route('logout') }}">
                                                        <em class="icon ni ni-signout"></em>
                                                        <span>
                                                            Se déconnecter
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')

            <div class="nk-footer bg-white">
                <div class="container-fluid">
                    <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright">
                            <span>© 2024 Cohérence.</span>
                            <span><img height="30" width="30" src="/images/logo.png" alt="" class="me-5"></span>
                            <span id="anime" class="badge rounded bg-warning">Version Démo</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes zoom {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.4);
            }

            100% {
                transform: scale(1);
            }
        }

        #anime {
            display: inline-block;
            animation: zoom 3s infinite alternate;
            /* Modifiez la durée et la vitesse selon vos besoins */
            border-radius: 10px;
        }
    </style>

    <div class="modal fade" tabindex="-1" id="modalt" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
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
        document.getElementById("form").addEventListener("submit", function(event) {
            event.preventDefault(); // Empêche la soumission par défaut du formulaire

            $('.modal').modal('hide');
            $(`#modalt`).modal('hide');
            $(`#modalt`).modal('show');

            // Si toutes les validations passent, soumettre le formulaire
            this.submit();
        });
    </script>
    <script>
        document.getElementById("form_click").addEventListener("click", function(event) {

            $('.modal').modal('hide');
            $(`#modalt`).modal('hide');
            $(`#modalt`).modal('show');

        });
    </script>

        <div class="modal fade" tabindex="-1" id="modalAlert2" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                            <h4 class="nk-modal-title">Session a éxpiré !</h4>
                            <div class="nk-modal-action mt-5">
                                <form class="login-form">
                                    <div class="form-group">
                                        <a class="btn btn-lg btn-mw btn-light" id="logoutBtn">
                                            ok
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('logoutBtn').addEventListener('click', function(event) {
                event.preventDefault(); // Pour éviter le comportement par défaut du lien
                window.location.reload();
            });
        </script>

        <script>
            // Cette fonction affiche le modal après un délai de 2 minutes
            function afficherModalApresDelai() {
                $('.modal').modal('hide'); // Assurez-vous que les modaux précédents sont masqués
                $('#modalAlert2').modal('show'); // Affiche le modal spécifié
                // Vous pouvez également ajouter d'autres opérations à effectuer après l'affichage du modal ici
            }
            // Utilise setTimeout() pour déclencher la fonction après un délai de 2 minutes
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(afficherModalApresDelai, 900000); // 900000 millisecondes = 15 minutes
            });
        </script>

    <script src="{{asset('assets/js/bundle0226.js')}}"></script>
    <script src="{{asset('assets/js/scripts0226.js')}}"></script>
    <script src="{{asset('assets/js/demo-settings0226.js')}}"></script>
    <script src="{{asset('assets/js/libs/datatable-btns0226.js')}}"></script>

    <link href="{{asset('notification/toastr.min.css')}}" rel="stylesheet">
    <script src="{{asset('notification/toastr.min.js')}}"></script>

    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}"," ",
            {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
            preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
            showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
        </script>
        {{ session()->forget('success') }}
    @endif
    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}"," ",
            {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
            preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
            showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
        </script>
        {{ session()->forget('error') }}
    @endif
    @if (session('warning'))
        <script>
            toastr.warning("{{ session('warning') }}"," ",
            {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
            preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
            showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
        </script>
        {{ session()->forget('warning') }}
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

</body>

</html>
