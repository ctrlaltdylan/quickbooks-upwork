@extends('layouts.app')

@section('title', trans('app.days_to_submit_an_estimate'))

@section('content')
<div class="row">
  <div class="col-lg-12 p-0">
    <h1 class="page-header"> @lang('app.days_to_submit_an_estimate')
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
          <li class="active">@lang('app.days_to_submit_an_estimate')</li>
        </ol>
      </div>
    </h1>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 p-0">
    <div class="panel panel-default">
      <div class="panel-body p-b-0">
        <table width="100%" class="table table-striped table-bordered table-hover m-b-10 table-report">
          <thead>
            <tr>
              <th width="15%">Number of days</th>
              @foreach($data as $rec)
               <th>{!! $rec['name'] !!}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1-5 Days</td>
              @foreach($data as $rec)
               <td>{!! $rec['onetofive'] !!}</td>
              @endforeach
            </tr>
            <tr>
              <td>5-10 Days</td>
              @foreach($data as $rec)
               <td>{!! $rec['fivetoten'] !!}</td>
              @endforeach
            </tr>
            
            <tr>
              <td>10-20 Days</td>
              @foreach($data as $rec)
               <td>{!! $rec['tentotwenty'] !!}</td>
              @endforeach
            </tr>
            <tr>
              <td>20+</td>
              @foreach($data as $rec)
               <td>{!! $rec['twentyplus'] !!}</td>
              @endforeach
            </tr>
            
          </tbody>
        </table>
        <div class="zero-margin"></div>
      </div>
    </div>
  </div>
</div>
@endsection