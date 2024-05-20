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
                            <div class="card-inner card-inner-xl">
                                <article class="entry">
                                    <h4>Objectifs de l'application</h4>
                                    <p>L’application Coherence Risk – CRM est conçue pour répondre a plusieurs besoins essentiels liées a la gestion des risques et des incidents d’une organisation. Cette application permettra la mise en œuvre automatique du point 10.2 de la norme ISO 9001 version 2015. </p>
                                    <p class="fw-bold" >Coherence Risk – CRM est une application multifonction qui vous permettra de :</p>

                                    <h5>Automatiser votre gestion des risques de vos processus </h5>
                                    <p>Dans de nombreuses entreprises, la gestion des risques des processus est un processus complexe et essentiel. Coherence Risk - CRM vise à automatiser cette gestion en fournissant des outils et des fonctionnalités permettant d'identifier, d'évaluer et de gérer les risques associés à chaque processus de l'entreprise. Cela permet d'améliorer la visibilité sur les risques potentiels, de prendre des mesures préventives et de réduire les impacts négatifs sur les opérations. </p>

                                    <h5>Gérer vos non-conformités, réclamations et contentieux de vos incidents</h5>
                                    <p>L'application offre également des fonctionnalités pour gérer les non-conformités, les réclamations et les contentieux des incidents. Ces aspects sont cruciaux pour assurer la conformité aux normes et réglementations, ainsi que pour garantir la satisfaction des clients et des parties prenantes. Coherence Risk - CRM permet de documenter, suivre et résoudre efficacement les non-conformités et les réclamations, tout en gérant les litiges éventuels résultant d'incidents.</p>

                                    <h5>Evaluer l’efficacité des actions mises en place face aux risques</h5>
                                    <p>Une composante clé de la gestion des risques est l'évaluation de l'efficacité des actions prises pour atténuer ou contrôler ces risques. Coherence Risk - CRM fournit des mécanismes pour évaluer et suivre l'impact des actions correctives et préventives mises en place pour faire face aux risques identifiés. Cela permet à l'organisation d'ajuster ses stratégies et ses plans d'action en fonction des résultats obtenus, afin d'améliorer continuellement sa capacité à gérer les risques.</p>
                                </article>
                            </div>
                        </div>
                    </div>

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <table class="table table-features">
                                <thead class="tb-ftr-head table-light">
                                    <tr class="tb-ftr-item">
                                        <th class="tb-ftr-info">
                                            Nombre d'enregistrements
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
                                            Nombre de risques
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
                                            Nombre d'incidents
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
                                            Fonctionnalités
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
