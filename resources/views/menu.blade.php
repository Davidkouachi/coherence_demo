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
                            <div class="col-md-6 col-xxl-3">
                                <div class="card card-bordered pricing recommend">
                                    <div class="pricing-head">
                                        <div class="pricing-title">
                                            <h4 class="card-title title text-warning fw-bold">Démo</h4>
                                            <p class="sub-text">Idéal pour les toutes personnes qui desire éffectuées des tests</p>
                                        </div>
                                    </div>
                                    <div class="pricing-body">
                                        <ul class="pricing-features">
                                            <li>
                                                <span class="w-50">Min Deposit</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-cross text-danger fw-bold" ></em>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="w-50">Min Deposit</span> - 
                                                <span class="ms-auto">
                                                    <em class="ni ni-check text-success fw-bold" ></em>
                                                </span>
                                            </li>
                                        </ul>
                                        <div class="pricing-action"><button class="btn btn-outline-light">Choose this plan</button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xxl-3">
                                <div class="card card-bordered pricing recommend"><span class="pricing-badge badge bg-primary">Recommend</span>
                                    <div class="pricing-head">
                                        <div class="pricing-title">
                                            <h4 class="card-title title text-danger fw-bold">Pro</h4>
                                            <p class="sub-text">Idéal pour les personnes qui veulent bénéficié de toutes les fonctionnaliés du logiciel</p>
                                        </div>
                                    </div>
                                    <div class="pricing-body">
                                        <ul class="pricing-features">
                                            <li><span class="w-50">Min Deposit</span> - <span class="ms-auto">$5,000</span></li>
                                            <li><span class="w-50">Max Deposit</span> - <span class="ms-auto">$20,000</span></li>
                                        </ul>
                                        <div class="pricing-action"><button class="btn btn-outline-light">Choose this plan</button></div>
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
