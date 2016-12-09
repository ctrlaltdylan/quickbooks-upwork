<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <link href="/css/bootstrap-3.3.7.min.css" rel="stylesheet">
    <link href="/css/metisMenu-2.5.2.min.css" rel="stylesheet">
    <link href="/css/font-awesome-4.6.3.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div style="display: none;">
    <nav class="navbar navbar-fixed-top navbar-custom">
        <div class="container-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('/img/logo.png') }}" alt="{{ config('app.name') }}">
                </a>
            </div>

            <a href="#" id="sidebar-toggle" class="btn sidebar-toggle">
                <i class="navbar-icon fa fa-bars icon"></i>
            </a>

            <button type="button" class="navbar-toggle collapsed clearfix" data-toggle="collapse" data-target="#navbar-top-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="clearfix visible-xs"></div>

            <div class="collapse navbar-collapse" id="navbar-top-collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::user()->role == 'Staff')
                        <li>
                            <button class="btn btn-circle btn-success" href="#">@lang('app.staff_check_in')</button>
                        </li>
                        <li>
                            <button class="btn btn-circle btn-danger" href="#">@lang('app.staff_sign_out')</button>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img alt="avatar" class="img-circle" src="{{ Auth::user()->present()->avatar }}">
                            {{  Auth::user()->present()->fullName }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="drop3">
                            <li>
                                <a href="{{ url('/profile') }}">
                                    <i class="fa fa-user"></i>
                                    @lang('app.my_profile')
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}">
                                    <i class="fa fa-sign-out"></i>
                                    @lang('app.logout')
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav >



    <div id="page-wrapper" class="page-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>

<div id="wrapper">

    <nav class="navbar navbar-static-top navbar-custom" role="navigation">

        @include('partials.navbar')

        @include('partials.sidebar')

    </nav>

    <div id="page-wrapper">

        @yield('content')

    </div>

</div>

<script src="/js/jquery-1.12.4.min.js"></script>
<script src="/js/bootstrap-3.3.7.min.js"></script>
<script src="/js/metisMenu-2.5.2.min.js"></script>
<script src="/vendor/jsvalidation/js/jsvalidation.js"></script>
<script src="/js/jquery.dataTables-1.10.12.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<script src="/js/app.js"></script>

@yield('scripts')

</body>
</html>