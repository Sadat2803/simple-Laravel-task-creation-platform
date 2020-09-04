@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="newRequestForm" method="post" action="{{route('createRequest')}}">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Description de la demande</label>
                            <textarea required id="recipient-name" class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Range:</label>
                            <select class="form-control form-control-lg" name="range">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Créer demande</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nouvelle demande <i class="fa fa-plus"></i></button>
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
            <h3 class="card-title">Demandes de travail de <b>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</b> </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="requestsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--  <th>Demande</th>-->
                    <th>Description</th>
                    <th>Etat</th>
                    <th>Range</th>
                    <th>Traité par</th>
                    <th>Nom traiteur</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr>
                      <!--  <td>{{$request->request_id}}</td>-->
                        <td>{{$request->request_description}}</td>
                        <td>{{$request->request_state}}</td>
                          <td>{{$request->request_range}}</td>
                        <td>{{$request->treated_by}}</td>
                        <td>{{$request->treater_name}}</td>
                        <td><a href="{{route('receivedDocuments',['requestId'=>$request->request_id])}}" class="btn btn-sm btn-block btn-info">Documents reçus</a></td>
                        <td>
                            <form method="post" action="{{route('closeRequest')}}">
                            @csrf
                                <input hidden name="request_id" value="{{$request->request_id}}">
                               <button type="submit" class="btn btn-sm btn-block btn-success">Cloturez demande</button>
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
