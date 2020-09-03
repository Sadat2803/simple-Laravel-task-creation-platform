@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Demandes de travail en attente</h3>
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
                        <td>
                            <form method="post" action="{{route('selectRequest')}}">
                                @csrf
                                <input type="hidden"  name="request_id" value="{{$request->request_id}}">
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
    <script>
        $(function () {
            $("#requestsTable").DataTable();

        });
    </script>
@endsection
