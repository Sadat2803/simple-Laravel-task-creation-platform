@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
<h1>{{$users}}</h1>
@stop
@section('javascript')

@endsection
