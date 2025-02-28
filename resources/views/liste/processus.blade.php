@extends('app')

@section('titre', 'Liste des Processus')

@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-head nk-block-head-sm" >
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content" style="margin:0px auto;">
                                        <h3 class="text-center">
                                            <span>Liste des Processus</span>
                                            <em class="icon ni ni-list-index"></em>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-md-12 col-xxl-12">
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <table class="datatable-init table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Approvisionnement</th>
                                                    <!--<th>Finalié</th>-->
                                                    <th>Nombre de risques</th>
                                                    <th>Nombre d'objectif</th>
                                                    <th>Taux</th>
                                                    <th>Date de création</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($processus as $key => $processu)
                                                    <tr>
                                                        <td>{{ $key+1}}</td>
                                                        <td>{{ $processu->nom}}</td>
                                                        <!--<td>{{ $processu->finalite}}</td>-->
                                                        <td>{{ $processu->nbre_risque}}</td>
                                                        <td>{{ $processu->nbre}}</td>
                                                        <td>
                                                            <div class="project-list-progress">
                                                                <div class="progress progress-pill progress-md bg-light">
                                                                    <div class="progress-bar" data-progress="{{$processu->progress}}" style="width: 100%;"></div>
                                                                </div>
                                                                <div class="project-progress-percent">
                                                                    {{$processu->progress}}%
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($processu->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}</td>
                                                        <td>
                                                            <div class="d-flex" >
                                                                <form method="post" action="{{ route('index_etat_processus') }}">
                                                                    @csrf
                                                                    <input type="text" name="id" value="{{$processu->id}}" style="display: none;">
                                                                    <a data-bs-toggle="modal"
                                                                        data-bs-target="#modalDetail{{$processu->id}}"
                                                                        href="#" class="btn btn-icon btn-white btn-dim btn-sm btn-warning border border-1 border-white rounded">
                                                                        <em class="icon ni ni-eye"></em>
                                                                    </a>
                                                                    @if($processu->nbre_risque > 0)
                                                                    <a data-bs-toggle="modal"
                                                                        data-bs-target="#modalRisque{{$processu->id}}"
                                                                        href="#" class="btn btn-icon btn-white btn-dim btn-sm btn-danger border border-1 border-white rounded">
                                                                        <em class="icon ni ni-list-thumb"></em>
                                                                    </a>
                                                                    @endif
                                                                    <button class="btn btn-icon btn-white btn-dim btn-sm btn-primary">
                                                                        <em class="icon ni ni-printer-fill"></em>
                                                                    </button>
                                                                </form>
                                                                <form method="post" action="{{ route('index_processus_modif') }}">
                                                                    @csrf
                                                                    <input type="text" name="id" value="{{$processu->id}}" style="display: none;">
                                                                    <button class="btn btn-icon btn-white btn-dim btn-sm btn-primary">
                                                                        <em class="icon ni ni-edit"></em>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <a class="btn btn-icon btn-white btn-dim btn-sm btn-primary border border-1 border-white rounded"> <em class="icon ni ni-help"></em> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($processus as $processu)
        <div class="modal fade zoom" tabindex="-1" id="modalDetail{{ $processu->id }}">
            <div class="modal-dialog modal-lg" role="document" style="width: 100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Détails</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em
                                class="icon ni ni-cross"></em></a>
                    </div>
                    <div class="modal-body">
                        <form class="nk-block" >
                            <div class="row g-gs">
                                <div class="col-md-12 col-xxl-12" id="groupesContainer">
                                    <div class="">
                                        <div class="card-inner">
                                                <div class="row g-4">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="Cause">
                                                                Processus
                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input value="{{ $processu->nom }}" readonly type="text" class="form-control" id="Cause">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="Cause">
                                                                Finalité
                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input value="{{ $processu->finalite }}" readonly type="text" class="form-control" id="Cause">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach ($objectifData[$processu->id] as $key => $objectifDat)
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="Cause">
                                                                Objectif {{ $key+1 }}
                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input value="{{ $objectifDat['objectif'] }}" readonly type="text" class="form-control" id="Cause">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-label" >
                                                                Description
                                                            </label>
                                                            <div class="form-control-wrap" >
                                                                <textarea readonly required name="causes" class="form-control no-resize" id="default-textarea">{{ $processu->description }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($processus as $processu)
        <div class="modal fade zoom" tabindex="-1" id="modalRisque{{ $processu->id }}">
            <div class="modal-dialog modal-lg" role="document" style="width: 100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Risques</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em
                                class="icon ni ni-cross"></em></a>
                    </div>
                    <div class="modal-body">
                        <form class="nk-block" >
                            <div class="row g-gs">
                                <div class="col-md-12 col-xxl-12">
                                    <div class="">
                                        <div class="card-inner">
                                                <div class="row g-4">
                                                    @foreach ($risqueData[$processu->id] as $key => $risqueDat)
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="Cause">
                                                                Risque {{ $key+1 }}
                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input value="{{ $risqueDat['risque'] }}" readonly type="text" class="form-control" id="Cause">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($processus as $processu)
        <div class="modal fade zoom" tabindex="-1" id="modalModif{{ $processu->id }}">
            <div class="modal-dialog modal-lg" role="document" style="width: 100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mise à jour</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em
                                class="icon ni ni-cross"></em></a>
                    </div>
                    <div class="modal-body">
                        <div class="nk-block" >
                            <div class="row g-gs align-items-center justify-content-center" >
                                    <div class="col-lg-12 col-xxl-12 "  >
                                        <div class="card">
                                            <div class="card-inner">
                                                <form id="form" method="post" action="{{ route('processus_modif') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input name="id" value="{{ $processu->id }}" type="text" class="form-control" style="display: none;">
                                                    <div class="row g-4 mb-4" id="objectifs-container" >
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="cf-full-name">
                                                                    Fichier ( .pdf )
                                                                </label>
                                                                <input autocomplete="off" id="fileInput" name="pdfFile" accept=".pdf" type="file" class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group text-center">
                                                                <label class="form-label" for="Cause">
                                                                    Nom du processus
                                                                </label>
                                                                <div class="form-control-wrap">
                                                                    <input placeholder="Saisie obligatoire" autocomplete="off" required name="nprocessus" type="text" class="form-control text-center" id="Cause" oninput="this.value = this.value.toUpperCase()" value="{{ $processu->nom}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group text-center">
                                                                <label class="form-label" for="description">
                                                                    Finalité
                                                                </label>
                                                                <div class="form-control-wrap">
                                                                    <input placeholder="Saisie obligatoire" autocomplete="off" required type="text" class="form-control text-center description" name="finalite" value="{{ $processu->finalite}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group text-center">
                                                                <label class="form-label" for="description">
                                                                    Description
                                                                </label>
                                                                <div class="form-control-wrap">
                                                                    <textarea name="description" class="form-control no-resize" id="default-textarea">{{ $processu->description}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @foreach ($objectifData[$processu->id] as $key => $objectifDat)
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="Cause">
                                                                    Objectif {{ $key+1 }}
                                                                </label>
                                                                <div class="form-control-wrap">
                                                                    <input name="objectifs[]" value="{{ $objectifDat['objectif'] }}" type="text" class="form-control" id="Cause">
                                                                    <input name="id_objectifs[]" value="{{ $objectifDat['id'] }}" type="text" style="display: none;">
                                                                </div>

                                                                <div class="custom-control custom-checkbox mt-4">
                                                                    <input value="{{ $objectifDat['id'] }}" name="id_suppr[{{$key+1}}]" type="text" style="display: none;">
                                                                    <input name="suppr[{{$key+1}}]" value="oui" type="checkbox" class="custom-control-input" id="customCheck1_{{$key+1}}">
                                                                    <label class="custom-control-label" for="customCheck1_{{$key+1}}">
                                                                        Supprimé
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="row g-gs">
                                                        <div class="col-lg-6">
                                                            <div class="form-group text-center">
                                                                <a class="btn btn-lg btn-warning" id="ajouter-objectif">
                                                                    <em class="ni ni-plus me-2"></em>
                                                                    <em>Objectif</em>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group text-center">
                                                                <button type="submit" class="btn btn-lg btn-primary">
                                                                    <em class="ni ni-check me-2"></em>
                                                                    <em>Mise àjour</em>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
