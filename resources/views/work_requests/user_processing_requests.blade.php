@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Demandes traitées par <b>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</b> </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="requestsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Demande</th>
                    <th>Demandeur</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Description</th>
                    <th>Etat</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{$request->request_id}}</td>
                        <td>{{$request->user_id}}</td>
                        <td>{{$request->last_name}}</td>
                        <td>{{$request->first_name}}</td>
                        <td>{{$request->request_description}}</td>
                        <td>{{$request->request_state}}</td>
                        <td><button type="button" class="btn btn-sm btn-block btn-info">Délivrez</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@stop

@section('javascript')
    <script>
        $(function () {
            $("#requestsTable").DataTable();

        });
    </script>
@endsection
