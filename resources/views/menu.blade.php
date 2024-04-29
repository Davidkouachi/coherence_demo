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
                            <div class="col-md-12 col-xxl-12 mb-0" >
                                <div class="card card-preview" style="background: transparent;">
                                    <div class="card-inner text-center">
                                        <img height="10%" width="10%" src="{{asset('images/logo.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xxl-12 mt-0" >
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
                                            <li>
                                                <span class="w-50">Gestion des utilisateurs</span> - 
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
                                            <span class="w-50 fw-bold">
                                                Pour plus d'infos : 
                                                <span>
                                                    +225 0715778107 / +225 0140073501
                                                </span> 
                                            </span>
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


@endsection
