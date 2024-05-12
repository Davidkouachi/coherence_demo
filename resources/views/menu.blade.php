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
                                        <img height="150px" width="185px" src="{{asset('images/logo.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xxl-12 mt-0" >
                                <div class="card card-preview" style="background: transparent;">
                                    <div class="card-inner text-center">
                                        <label class="form-label" style="font-size: 20px;">
                                            <span>Coherence - risk - CRM</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <table class="table table-features">
                                <thead class="tb-ftr-head table-light">
                                    <tr class="tb-ftr-item">
                                        <th class="tb-ftr-info">
                                            Fonctionnalité
                                        </th>
                                        <th class="tb-ftr-plan">
                                            <span class="text-warning" >Démo</span>
                                        </th>
                                        <th class="tb-ftr-plan">
                                            <span class="text-danger">Pro</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="tb-ftr-body">
                                    <tr class="tb-ftr-item">
                                        <td class="tb-ftr-info">
                                            Validation des risques et des incidents
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-check-thick text-success">
                                            </em>
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-check-thick text-success">
                                            </em>
                                        </td>
                                    </tr>
                                    <tr class="tb-ftr-item">
                                        <td class="tb-ftr-info">
                                            Gestion des utilisateurs
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-cross text-danger">
                                            </em>
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-check-thick text-success">
                                            </em>
                                        </td>
                                    </tr>
                                    <tr class="tb-ftr-item">
                                        <td class="tb-ftr-info">
                                            Notification par Email ou SMS
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-cross text-danger">
                                            </em>
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-check-thick text-success">
                                            </em>
                                        </td>
                                    </tr>
                                    <tr class="tb-ftr-item">
                                        <td class="tb-ftr-info">
                                            Alert instantanée à l'écran
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-cross text-danger">
                                            </em>
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-check-thick text-success">
                                            </em>
                                        </td>
                                    </tr>
                                    <tr class="tb-ftr-item">
                                        <td class="tb-ftr-info">
                                            Suivi des actions
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-cross text-danger">
                                            </em>
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-check-thick text-success">
                                            </em>
                                        </td>
                                    </tr>
                                    <tr class="tb-ftr-item">
                                        <td class="tb-ftr-info">
                                            Paramétrage des couleurs
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-cross text-danger">
                                            </em>
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-check-thick text-success">
                                            </em>
                                        </td>
                                    </tr>
                                    <tr class="tb-ftr-item">
                                        <td class="tb-ftr-info">
                                            Mise à jour des risques et des incidents
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-cross text-danger">
                                            </em>
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-check-thick text-success">
                                            </em>
                                        </td>
                                    </tr>
                                    <tr class="tb-ftr-item">
                                        <td class="tb-ftr-info">
                                            Evaluation des processus
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-cross text-danger">
                                            </em>
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <em class="icon ni ni-check-thick text-success">
                                            </em>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="tb-ftr-head table-light">
                                    <tr class="tb-ftr-item">
                                        <th class="tb-ftr-info">
                                            Nombre d'enregistrements
                                        </th>
                                        <th class="tb-ftr-plan">
                                            
                                        </th>
                                        <th class="tb-ftr-plan">
                                            
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="tb-ftr-body">
                                    <tr class="tb-ftr-item">
                                        <td class="tb-ftr-info">
                                            Nombre de processus
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <span class="text-warning">02</span>
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <span class="text-success">illimité</span>
                                        </td>
                                    </tr>
                                    <tr class="tb-ftr-item">
                                        <td class="tb-ftr-info">
                                            Nombre de risque
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <span class="text-warning">02</span>
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <span class="text-success">illimité</span>
                                        </td>
                                    </tr>
                                    <tr class="tb-ftr-item">
                                        <td class="tb-ftr-info">
                                            Nombre d'incident
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <span class="text-warning">02</span>
                                        </td>
                                        <td class="tb-ftr-plan">
                                            <span class="text-success">illimité</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="tb-ftr-head table-light">
                                    <tr class="tb-ftr-item">
                                        <th class="tb-ftr-info">
                                            Pour plus d'infos : +225 0715778107 / +225 0140073501
                                        </th>
                                        <th class="tb-ftr-plan">
                                            
                                        </th>
                                        <th class="tb-ftr-plan">
                                            
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
