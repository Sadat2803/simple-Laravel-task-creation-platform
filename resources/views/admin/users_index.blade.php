@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvel utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="newUserForm" method="post" action="{{route('createUser')}}">
                        @csrf
                        <div class="form-group">
                            <label for="lastName" class="col-form-label">Nom</label>
                            <input type="text" required id="lastName" name="last_name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="firstName" class="col-form-label">Prénom</label>
                            <input type="text"  required id="firstName" name="first_name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" required id="email" name="email" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Mot de passe</label>
                            <input id="password" type="password" required name="password" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="col-form-label">Confirmer mot de passe</label>
                            <input id="password_confirmation" type="password" required name="password_confirmation" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="range" class="col-form-label">Range</label>
                            <select id="range" class="form-control form-control-lg" name="range_id">
                                <option value="1">
                                    Junior
                                </option>
                                <option value="2">
                                    Confirmé
                                </option>
                                <option value="3">
                                    Sénior
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="department" class="col-form-label">Département</label>
                            <select id="department" class="form-control form-control-lg" name="department_id">
                                <option value="1">
                                    FN
                                </option>
                                <option value="2">
                                    RH
                                </option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Créer utilisateur</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Créer utilisateur <i class="fa fa-plus"></i></button>
    </div>
    </br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des utilisateurs</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="requestsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nom demandeur</th>
                    <th>Prénom demande</th>
                    <th>Email</th>
                    <th>Range</th>
                    <th>Nom département</th>
                    <th>Type</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->user_email}}</td>
                        <td>{{$user->range_name}}</td>
                        <td>{{$user->department_name}}</td>
                        <td>{{$user->department_type}}</td>
                        <td>
                            <form>
                                @csrf
                                <input type="hidden"  name="request_id" >
                                <button type="submit" class="btn btn-sm btn-block btn-info">Réservez</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@stop
@section('javascript')

@endsection
