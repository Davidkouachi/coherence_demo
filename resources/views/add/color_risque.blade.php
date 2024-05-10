@extends('app')

@section('titre', 'Paramettrage')

@section('option_btn')

    <li class="dropdown chats-dropdown">
        <a href="{{ route('index_accueil') }}" class="dropdown-toggle nk-quick-nav-icon">
            <div class="icon-status icon-status-na">
                <em class="icon ni ni-home"></em>
            </div>
        </a>
    </li>

@endsection

@section('content')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content" style="margin:0px auto;">
                            <h3 class="text-center">
                                <span>Paramettrage des couleurs</span>
                                <em class="icon ni ni-setting-alt"></em>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block ">
                    <div class="row g-gs">
                        <div class="col-lg-12 col-xxl-12">
                            <div class="card card-bordered card-full">
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h5 class="title">
                                                Couleurs en fonction des intervalles
                                            </h5>
                                            <span class="nk-menu-badge bg-danger text-white">
                                                pro
                                            </span>
                                        </div>
                                        @if($color_para->nbre_color > $color_interval_nbre )
                                        <div class="card-tools">
                                            <ul>
                                                <li>
                                                    <a data-bs-toggle="modal" data-bs-target="#modalColor_interval_plus" href="#" class="btn btn-sm btn-success rounded">
                                                            <em class="icon ni ni-plus"></em>
                                                        </a>
                                                </li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group align-items-center justify-content-center">
                                        <div class="row g-4 mb-0" id="objectifs-container">
                                            <div class="col-lg-3">
                                                <div class="form-group text-center">
                                                    <label class="form-label" for="Cause">
                                                        De
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input value="{{ $color_para->nbre1 }}" readonly type="text" class="form-control text-center">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group text-center">
                                                    <label class="form-label" for="Cause">
                                                        à
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input value="{{ $color_para->nbre2 }}" readonly type="text" class="form-control text-center">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group text-center">
                                                    <label class="form-label" for="Cause">
                                                        Nombre de couleurs
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input value="{{ $color_para->nbre_color }}" readonly type="text" class="form-control text-center">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group text-center">
                                                    <label class="form-label" for="Cause">
                                                        Opération
                                                    </label>
                                                    <div class="form-control-wrap d-flex">
                                                        <input value="{{ $color_para->operation }}" readonly type="text" class="form-control text-center me-2">
                                                    </div>
                                                </div>
                                            </div>

                                            @if( intval($color_para->nbre_color) > intval($color_interval_nbre) )
                                                <div class="col-lg-12">
                                                    <div class="form-group text-center">
                                                        <label class="form-label">
                                                            <em class="nk-modal-icon icon icon-circle icon-circle-md ni ni-alert bg-warning"></em>
                                                            <em class="text-warning" >
                                                                Paraméttrage non complet
                                                            </em>
                                                        </label>
                                                    </div>
                                                </div>
                                            @else
                                                @php
                                                    $isOutOfRange = false;
                                                    $maxValue = ($color_para->operation === 'addition') ? (intval($color_para->nbre2) + intval($color_para->nbre2)) : (intval($color_para->nbre2) * intval($color_para->nbre2));
                                                @endphp

                                                @for ($i = 1; $i <= $maxValue; $i++)
                                                    @php
                                                        $isInInterval = false;
                                                    @endphp

                                                    @foreach($color_intervals as $color_interval)
                                                        @if ($i >= $color_interval->nbre1 && $i <= $color_interval->nbre2)
                                                            @php
                                                                $isInInterval = true;
                                                                break; // Sortir de la boucle dès qu'un intervalle correspond
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    @unless($isInInterval)
                                                        @if($i)
                                                            @php
                                                                $isOutOfRange = true;
                                                            @endphp
                                                        @endif
                                                    @endunless
                                                @endfor

                                                @if($isOutOfRange)
                                                    <div class="col-lg-12">
                                                        <div class="form-group text-center">
                                                            <label class="form-label">
                                                                <em class="nk-modal-icon icon icon-circle icon-circle-md ni ni-alert bg-warning"></em>
                                                                <em class="text-warning" >
                                                                    Paraméttrage non complet
                                                                </em>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-lg-12">
                                                        <div class="form-group text-center">
                                                            <label class="form-label">
                                                                <em class="nk-modal-icon icon icon-circle icon-circle-md ni ni-check bg-success"></em>
                                                                <em class="text-success" >
                                                                    Paraméttrage complet
                                                                </em>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <ul class="nk-activity" style="margin: 0 auto;">

                                    @if( $color_interval_nbre > 0 )
                                        @foreach($color_intervals as $key => $color_interval )
                                        <li class="nk-activity-item border-0">
                                            @if( $color_interval->color === 'vert' )
                                                <div class="nk-activity-media user-avatar" style="background-color:{{$color_interval->code_color}};"></div>
                                            @elseif( $color_interval->color === 'jaune' )
                                                <div class="nk-activity-media user-avatar" style="background-color:{{$color_interval->code_color}};"></div>
                                            @elseif( $color_interval->color === 'orange' )
                                                <div class="nk-activity-media user-avatar" style="background-color:{{$color_interval->code_color}};"></div>
                                            @elseif( $color_interval->color === 'rouge' )
                                                <div class="nk-activity-media user-avatar" style="background-color:{{$color_interval->code_color}};"></div>
                                            @endif
                                            <div class="nk-activity-data" style="width: 100px;">
                                                <div class="label">
                                                    De {{ $color_interval->nbre1 }} à {{ $color_interval->nbre2 }}
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


