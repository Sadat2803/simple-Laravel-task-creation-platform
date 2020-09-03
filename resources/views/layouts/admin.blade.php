<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
    @yield('css')
</head>


<body class="hold-transition skin-green-light sidebar-mini">

<div id="wrapper">

@include('partials.topbar')
@include('partials.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif

            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </section>
    </div>
</div>
<form  id="logoutForm" hidden method="POST" action="{{route('logout')}}">
@csrf
</form>

@include('partials.javascripts')
@yield('scripts')
</body>
</html>
