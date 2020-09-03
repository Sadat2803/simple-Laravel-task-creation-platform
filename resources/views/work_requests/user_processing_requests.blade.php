@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Demandes de travail de <b>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</b> </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="requestsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Demande</th>
                    <th>Description</th>
                    <th>Etat</th>
                    <th>Traité par</th>
                    <th>Nom traiteur</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{$request->request_id}}</td>
                        <td>{{$request->request_description}}</td>
                        <td>{{$request->request_state}}</td>
                        <td>{{$request->treated_by}}</td>
                        <td>{{$request->treater_name}}</td>
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
