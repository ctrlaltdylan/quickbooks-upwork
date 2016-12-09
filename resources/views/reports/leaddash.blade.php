@extends('layouts.app')

@section('title', trans('app.leads_dashboard'))

@section('content')
    <div class="row">
        <div class="col-lg-12 p-0">
            <h1 class="page-header">
                @lang('app.leads_dashboard')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">@lang('app.leads_dashboard')</li>
                    </ol>
                </div>
            </h1>
        </div>
    </div>

    <div class="row">
       
        <div class="col-lg-7 p-0">
            <div class="panel panel-default">
                <div class="panel-body p-b-0">
                    <table width="100%" class="table table-striped table-bordered table-hover m-b-10 table-report">
                        <thead>
                        <tr>
                            <th width="50%">Source</th>
                            <th width="25%">Total Leads</th>
                            <th width="25%">Total Signed</th>
                        </tr>
                        </thead>
                        <tbody>
        				 @foreach($data as $sngl_rec)
                        <tr>
                            <td>{!! $sngl_rec['title'] !!}</td>
                            <td>{!! $sngl_rec['total_leads'] !!}</td>
                            <td>{!! $sngl_rec['signed'] !!}</td>
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