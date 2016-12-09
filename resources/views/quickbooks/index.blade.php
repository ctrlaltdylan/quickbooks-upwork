<?php 
    require_once(public_path('v3-php-sdk-2.2.0-RC/config.php'));  // Default V3 PHP SDK (v2.0.1) from IPP
    require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
    require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
    require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
    require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
    error_reporting(E_ERROR | E_PARSE);
?>

@extends('layouts.app')

@section('title', trans('app.qbintegration'))

@section('header')
  <script type="text/javascript" src="https://appcenter.intuit.com/Content/IA/intuit.ipp.anywhere.js"></script>
  <script>
    // Runnable uses dynamic URLs so we need to detect our current //
    // URL to set the grantUrl value   ########################### //
    /*######*/ var parser = document.createElement('a');/*#########*/
    /*######*/parser.href = document.url;/*########################*/
    // end runnable specific code snipit ##########################//
    intuit.ipp.anywhere.setup({
        menuProxy: '',
        grantUrl: 'http://'+parser.hostname+'/PHPOAuthSample/oauth.php?start=t' 
        // outside runnable you can point directly to the oauth.php page
    });
  </script>
@endsection

@section('content')
<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('app.qbintegration')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">@lang('app.qbintegration')</li>
                    </ol>
                </div>
            </h1>
            @if( Session::has('success'))
                <div class="alert alert-success alert-notification" role="alert">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <strong>{{ Session::get('success') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
	  <div class="col-lg-12 col-md-12">
	     {!! Form::open(['url' => 'qb']) !!} 
	        @include('quickbooks._form')
	     {!! Form::close() !!} 
	  </div>
	</div>
@endsection