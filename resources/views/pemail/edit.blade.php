@extends('layouts.app')

@section('title', trans('app.update_pe'))

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"> @lang('app.update_pe')
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
          <li><a href="{{ url('/pe') }}">@lang('app.pe')</a></li>
          <li class="active">@lang('app.update_pe')</li>
        </ol>
      </div>
    </h1>
    
    </div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12">
     {!! Form::model($pe,['url' => 'pe/'.$pe->id]) !!} 
     {{ method_field('PUT') }}
        @include('pemail._form')
     {!! Form::close() !!} 
      
  </div>
</div>
@endsection