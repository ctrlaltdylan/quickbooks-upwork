@extends('layouts.app')

@section('title', trans('app.update_ls'))

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"> @lang('app.update_ls')
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
          <li><a href="{{ route('admin.role.list') }}">@lang('app.ls')</a></li>
          <li class="active">@lang('app.update_ls')</li>
        </ol>
      </div>
    </h1>
    
    </div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12">
     {!! Form::model($ls,['url' => 'ls/'.$ls->id]) !!} 
     {{ method_field('PUT') }}
        @include('leadsource._form')
     {!! Form::close() !!} 
      
  </div>
</div>
@endsection