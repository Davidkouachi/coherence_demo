@extends('app')

@section('titre', 'Commentaire')

@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content" style="margin:0px auto;">
                            <h3 class="text-center">
                                <span>Commentaires</span>
                                <em class="icon ni ni-chat"></em>
                            </h3>
                        </div>
                    </div>
                </div>
                    <div class="nk-block">
                        <div class="row g-gs" >
                            @foreach($coms as $com)
                            <div class="col-lg-4" >
                                <div class="card">
                                    <div class="kanban-item">
                                        <div class="kanban-item-title">
                                            <h6 class="title">{{ $com->name}}</h6>
                                            <div class="drodown"> <a class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <div class="user-avatar-group">
                                                        <div class="user-avatar xs bg-primary">
                                                            <span>
                                                                <em class="icon ni ni-user" ></em>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr p-3 g-2">
                                                        <li>
                                                            <div class="user-card">
                                                                <div class="user-avatar sm bg-danger"> <span>VL</span> </div>
                                                                <div class="user-name"> <span class="tb-lead">Victoria Lynch</span> </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kanban-item-text">
                                            <p>{{ $com->text}}.</p>
                                        </div>
                                        <ul class="kanban-item-tags">
                                            <li><span class="badge bg-primary">{{ $com->nom_em}}</span></li>
                                        </ul>
                                        <div class="kanban-item-meta">
                                            <ul class="kanban-item-meta-list">
                                                <li><em class="icon ni ni-calendar"></em><span>{{ \Carbon\Carbon::parse($com->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
