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
    <link href="/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/css/jquery.timepicker.css" rel="stylesheet">
    
    <link href="/css/cms.css" rel="stylesheet">
    
    <link href="/css/app.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('css')
    @yield('header')
</head>
<body>



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
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/jquery.timepicker.min.js"></script>

<script src="/js/app.js"></script>

@yield('scripts')
@stack('javascript')
</body>
</html>