@extends('app')

@section('titre', 'Liste des utilisateurs')

@section('content')

            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm" >
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content" style="margin:0px auto;">
                                        <h3 class="text-center">
                                            <span>Liste des utilisateurs</span>
                                            <em class="icon ni ni-list"></em>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-lg-12 col-xxl-12">
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <table class="datatable-init table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nom et Prénoms</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Type de compte</th>
                                                    <th>Nombre processus</th>
                                                    <th>Nombre risques</th>
                                                    <th>Nombre incidents</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $key => $user)
                                                    <tr>
                                                        <td>{{ $key+1}}</td>
                                                        <td>{{ $user->name}}</td>
                                                        <td>{{ $user->email}}</td>
                                                        <td>{{ $user->tel}}</td>
                                                        <td>
                                                            @if ($user->poste === 'pro')
                                                                <span class="badge rounded bg-danger">
                                                                    Version Pro
                                                                </span>
                                                            @elseif ($user->poste === 'demo')
                                                                <span class="badge rounded bg-warning">
                                                                    Version Pro
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $user->nbre_processus}}</td>
                                                        <td>{{ $user->nbre_risque}}</td>
                                                        <td>{{ $user->nbre_incident}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
