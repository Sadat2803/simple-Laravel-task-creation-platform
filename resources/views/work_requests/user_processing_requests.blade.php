@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Demandes en cours de traitement par <b>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</b> </h3>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
    @endif
        <!-- /.card-header -->
        <div class="card-body">
            <table id="requestsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Description</th>
                    <th>Etat</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{$request->last_name}}</td>
                        <td>{{$request->first_name}}</td>
                        <td>{{$request->request_description}}</td>
                        <td>{{$request->request_state}}</td>
                        <td><a  target="_blank" href="{{route('chat')}}" class="btn btn-sm btn-block btn-info">Ouvrir discussion</a></td>
                        <td>
                            <form action="{{ route('fileUpload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <row>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success">Délivrez travail</button>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                    <input hidden name="user_id" value="{{$request->user_id}}" >

                                    <input hidden name="request_id" value="{{$request->request_id}}" >

                                </row>
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
