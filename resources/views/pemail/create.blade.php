@extends('layouts.app')

@section('title', trans('app.create_pe'))

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"> @lang('app.create_pe')
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
          <li><a href="{{ url('/pe') }}">@lang('app.pe')</a></li>
          <li class="active">@lang('app.create_pe')</li>
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
     {!! Form::open(['url' => 'pe']) !!} 
        @include('pemail._form')
     {!! Form::close() !!} 
      
  </div>
</div>
@endsection