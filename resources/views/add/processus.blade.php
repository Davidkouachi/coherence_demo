@extends('app')

@section('titre', 'Nouveau Processus')

@section('content')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content" style="margin:0px auto;">
                            <h3 class="text-center">
                                <span>Nouveau Processus</span>
                                <em class="icon ni ni-share-alt"></em>
                            </h3>
                        </div>
                    </div>
                </div>
                @if( $block == 'non')
                <div class="nk-block ">
                    <div class="row g-gs align-items-center justify-content-center">
                        <div class="col-md-10 col-xxl-10 ">
                            <div class="card card-bordered ">
                                <div class="card-inner">
                                    <form id="form" method="post" action="{{ route('add_processus') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-4 mb-4" id="objectifs-container">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="cf-full-name">
                                                        <span>Fichier ( .pdf )</span>
                                                        <span class="badge rounded bg-danger">Version Pro</span>
                                                    </label>
                                                    <input disabled autocomplete="off" id="fileInput" name="pdfFile" accept=".pdf" type="file" class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group text-center">
                                                    <label class="form-label" for="Cause">
                                                        Nom du processus
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input placeholder="Saisie obligatoire" autocomplete="off" required name="nprocessus" type="text" class="form-control text-center" id="Cause" oninput="this.value = this.value.toUpperCase()">
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <label class="form-label" for="description">
                                                        Finalité
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input placeholder="Saisie obligatoire" autocomplete="off" required type="text" class="form-control text-center description" name="finalite">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group text-center">
                                                    <label class="form-label" for="description">
                                                        Description
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <textarea name="description" class="form-control no-resize" id="default-textarea"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group text-center">
                                                    <label class="form-label" for="objectif">
                                                        Objectif(s)
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input placeholder="Saisie obligatoire" autocomplete="off" required type="text" class="form-control text-center objectif" name="objectifs[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-gs">
                                            <div class="col-lg-6">
                                                <div class="form-group text-center">
                                                    <button type="button" class="btn btn-md btn-primary btn-dim" id="ajouter-objectif">
                                                        <span>Objectif</span>
                                                        <em class="icon ni ni-plus"></em>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn btn-md btn-success btn-dim">
                                                        <span>Enregistrer</span>
                                                        <em class="icon ni ni-check"></em>
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
                @else
                <div class="nk-block ">
                    <div class="row g-gs">
                        <div class="col-lg-12 col-xxl-12 ">
                            <div class="modal-content bg-white">
                                <div class="modal-body modal-body-lg text-center">
                                    <div class="nk-modal">
                                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-trend-up bg-danger"></em>
                                        <h4 class="nk-modal-title">Version PRO!</h4>
                                        <div class="nk-modal-text">
                                            <div class="caption-text">
                                                Pour éffectuer un nouvel enregistrement, passer a la version Pro
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('ajouter-objectif').addEventListener('click', function(event) {
        event.preventDefault();
        const container = document.getElementById('objectifs-container');
        const div = document.createElement('div');
        div.classList.add('col-lg-12');
        div.innerHTML = `
            <div class="row g-g2" >
                <div class=" col-md-12 form-group">
                    <div class="form-control-wrap">
                        <input placeholder="Saisie obligatoire" autocomplete="off" required type="text" class="form-control text-center objectif me-2" name="objectifs[]">
                    </div>
                </div>
                <div class=" col-md-12 form-group">
                    <div class="form-control-wrap ">
                        <button type="button" class="btn btn-danger btn-dim text-center btn-remove-objectif">
                            <em class="ni ni-trash me-2"></em>
                            <em>Supprimer</em>
                        </button>
                    </div>
                </div>
            </div>
            `;
        container.appendChild(div);

        // Ajouter un écouteur d'événement pour supprimer l'objectif
        div.querySelector('.btn-remove-objectif').addEventListener('click', function() {
            container.removeChild(div);
        });
    });
</script>

@endsection
