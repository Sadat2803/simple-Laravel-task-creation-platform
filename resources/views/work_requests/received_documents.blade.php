@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Documents reçus</h3>
        </div>
        @if (empty($files))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Aucun document associé à la demande n'a été envoyé jusqu'a présent</strong>
            </div>
         @endif
        <!-- /.card-header -->
        <div class="card-body">
            @foreach($files as $file)
                <a download href="{{asset($file)}}" download>{{$file}} </a>
            @endforeach
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
