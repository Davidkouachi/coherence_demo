@extends('app')

@section('titre', 'Accueil')

@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block justify-items-center">
                        <form class="row g-gs" >
                            <div class="col-lg-12 col-xxl-12" style="margin-bottom: -15px; display: none;" >
                                <div class="card card-preview" style="margin-top: -15px;background: transparent;">
                                    <div class="" style="height: 30px; display: flex; " >
                                        <label class="form-label" style="font-size: 20px; color: red;margin-left:5px;">
                                            Alert:
                                        </label>
                                        <marquee>
                                            <label style="font-size: 20px; color: red;">
                                                Nouveau
                                            </label>
                                        </marquee>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xxl-12 " >
                                <div class="card card-preview" style="background: transparent;">
                                    <div class="card-inner text-center">
                                        <img height="20%" width="20%" src="{{asset('images/logo.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xxl-12 " >
                                <div class="card card-preview" style="background: transparent;">
                                    <div class="card-inner text-center">
                                        <label class="form-label" style="font-size: 40px;">
                                            <span>Coherence - risk - CRM</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="nk-block">
                        <div class="row g-gs align-items-center justify-content-center">
                            <div class="col-lg-6 col-xxl-4">
                                <div class="card card-bordered pricing recommend">
                                    <div class="pricing-head">
                                        <div class="pricing-title">
                                            <h4 class="card-title title text-warning fw-bold">Démo</h4>
                                        </div>
                                    </div>
                                    <div class="pricing-body">
                                        <ul class="pricing-features">
                                            <li>
                                                <span class="w-50">Nombre de processus</span> - 
                                                <span class="ms-auto ">
                                                    2
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Evaluation des processus</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-cross text-danger fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Nombre de risques</span> - 
                                                <span class="ms-auto ">
                                                    2
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Validation des risques</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-check text-success fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Mise à jour des risques</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-cross text-danger fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Nombre d'incidents</span> - 
                                                <span class="ms-auto ">
                                                    2
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Validation des incidents</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-check text-success fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Mise à jour des incidents</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-cross text-danger fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Paramétrage des couleurs</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-cross text-danger fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Suivi des actions</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-cross text-danger fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Alert instantanée à l'écran</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-cross text-danger fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Notification par Email ou SMS</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-cross text-danger fw-bold" ></em>
                                                </span>
                                            </li>
                                        </ul>
                                        <div class="pricing-action">
                                            <span class="badge badge-dot bg-primary">Actuel</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xxl-4">
                                <div class="card card-bordered pricing recommend"><span class="pricing-badge badge bg-success">Recommendé</span>
                                    <div class="pricing-head">
                                        <div class="pricing-title">
                                            <h4 class="card-title title text-danger fw-bold">Pro</h4>
                                        </div>
                                    </div>
                                    <div class="pricing-body">
                                        <ul class="pricing-features">
                                            <li>
                                                <span class="w-50">Nombre de processus</span> - 
                                                <span class="ms-auto text-success">
                                                    illimité
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Evaluation des processus</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-check text-success fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Nombre de risques</span> - 
                                                <span class="ms-auto text-success">
                                                    illimité
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Validation des risques</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-check text-success fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Mise à jour des risques</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-check text-success fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Nombre d'incidents</span> - 
                                                <span class="ms-auto text-success">
                                                    illimité
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Validation des incidents</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-check text-success fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Mise à jour des incidents</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-check text-success fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Paramétrage des couleurs</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-check text-success fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Suivi des actions</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-check text-success fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Alert instantanée à l'écran</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-check text-success fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Notification par Email ou SMS</span> - 
                                                <span class="ms-auto text-success">
                                                    illimité
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Gestion des utilisateurs</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-check text-success fw-bold" ></em>
                                                </span>
                                            </li>
                                        </ul>
                                        <div class="pricing-action">
                                            <a class="btn btn-outline-success" href="#" data-bs-toggle="modal" data-bs-target="#modalCommande">
                                                <span><em class="ni ni-bag me-2" ></em></span>
                                                <span>Choisir</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="modalCommande" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informtions</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <form onsubmit="return validateEmail()" class="row g-gs">
                        <div class="col-lg-6" >
                            <div class="form-group">
                                <label class="form-label">Type</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2">
                                        <option value=""></option>
                                        <option value="Particulier">Particulier</option>
                                        <option value="Entreprise">Entreprise</option>
                                        <option value="Organisation">Organisation</option>
                                    </select>
                                </div>
                            </div>  
                        </div>
                        <div class="col-lg-6" >
                            <div class="form-group">
                                <label class="form-label" for="full-name">Nom</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="full-name">
                                </div>
                            </div>  
                        </div>
                        <div class="col-lg-8" >
                            <div class="form-group">
                                <label class="form-label" for="email-address">Email</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="email-address">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4" >
                            <div class="form-group">
                                <label class="form-label" for="phone">Contact</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="phone">
                                    <script>
                                        var phone = document.getElementById('phone');
                                        phone.addEventListener('input', function() {
                                            // Supprimer tout sauf les chiffres
                                            this.value = this.value.replace(/[^0-9]/g, '');
                                            // Limiter la longueur à 10 caractères
                                            if (this.value.length > 10) {
                                                this.value = this.value.slice(0, 10);
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" >
                            <div class="form-group">
                                <label class="form-label" for="address">Adresse ou localisation</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="address">
                                </div>
                            </div>  
                        </div>
                        <div class="col-lg-12 text-center" >
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-outline-success">
                                    <span class="me-2" >Terminé</span>
                                    <span><em class="ni ni-check" ></em></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">Coherence Risk - CRM</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateEmail() {
            var emailInput = document.getElementById('email-address').value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email validation regex

            if (emailRegex.test(emailInput)) {
                toastr.success("email valide.");
                return true;
            } else {
               toastr.error("email invalide.");
               return false;
            }
        }
    </script>


@endsection
