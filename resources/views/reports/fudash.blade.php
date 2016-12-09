@extends('layouts.app')

@section('title', trans('app.follow_up_dashboard'))

@section('content')
<div class="row">
  <div class="col-lg-12 p-0">
    <h1 class="page-header"> @lang('app.follow_up_dashboard')
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
          <li class="active">@lang('app.follow_up_dashboard')</li>
        </ol>
      </div>
    </h1>
  </div>
</div>
<div class="row"> {!! Form::model($req,['method' =>'GET','url' => 'follow_up_dashboard']) !!}
  <div class="col-lg-3 p-0">
    <div class="panel panel-default">
      <div class="panel-heading">Filter By Estimator</div>
      <div class="panel-body p-b-0">
        <table width="100%" class="table table-striped table-bordered  m-b-10">
          <tr>
            <td> {!! Form::select('estimator', $estimatordd, null, ['class' => 'form-control']) !!}</td>
          </tr>
          <tr>
            <td>{!! Form::submit('Search',['class' => 'btn btn-success']) !!}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
  <div class="col-lg-9">
    <div class="panel panel-default">
      <div class="panel-body p-b-0">
        <table width="100%" class="table table-striped table-bordered table-hover m-b-10 table-report">
          <thead>
            <tr>
              <th width="40%">Estimator</th>
              <th width="25%">Total Clients</th>
              <th width="35%"></th>
            </tr>
          </thead>
          <tbody>
          
          @foreach ($estimators as $estimator)
          <tr>
            <td width="40%">{!! $estimator['name'] !!}</td>
            <td width="25%">{!! $estimator['total'] !!}</td>
            <td width="35%">
            <div class="m-l-10 m-r-10">
                <div class="btn-group">
                  <button type="button" class="btn btn-info p-l-40 p-r-40">Details</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
                  <ul class="dropdown-menu custom_min">
                    <li class="p-l-10">Scheduled For Estimate:: {!! $estimator['scheduled_for_estimate'] !!}</li>
                    <li role="separator" class="divider"></li>
                    <li class="p-l-10">Estimate In Progress:: {!! $estimator['Estimate_in_progress'] !!}</li>

                    <li role="separator" class="divider"></li>
                    <li class="p-l-10">Post Estimate follow up:: {!! $estimator['post_est_follow_up'] !!}</li>

                    <li role="separator" class="divider"></li>
                    <li class="p-l-10">Estimate Provided:: {!! $estimator['Estimate_provided'] !!}</li>

                    <li role="separator" class="divider"></li>
                    <li class="p-l-10">Waiting For Client:: {!! $estimator['waiting_for_client'] !!}</li>
                    
                  </ul>
                </div>
              </div></td>
          </tr>
          @endforeach
            </tbody>
          
        </table>
        <div class="zero-margin"></div>
      </div>
    </div>
  </div>
</div>
@endsection