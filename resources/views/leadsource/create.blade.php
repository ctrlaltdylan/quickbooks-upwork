@extends('layouts.app')

@section('title', trans('app.create_ls'))

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"> @lang('app.create_ls')
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
          <li><a href="{{ route('admin.role.list') }}">@lang('app.ls')</a></li>
          <li class="active">@lang('app.create_ls')</li>
        </ol>
      </div>
    </h1>
    @if($errors->first())
    <div class="alert alert-danger alert-notification" role="alert">
      <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>{{ $errors->first() }}</strong> </div>
    @endif </div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12">
     {!! Form::open(['url' => 'ls']) !!} 
        @include('leadsource._form')
     {!! Form::close() !!} 
      
  </div>
</div>
@endsection