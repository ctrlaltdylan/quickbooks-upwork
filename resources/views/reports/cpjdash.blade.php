@extends('layouts.app')

@section('title', trans('app.completed_jobs_dashboard'))

@section('content')
    <div class="row">
        <div class="col-lg-12 p-0">
            <h1 class="page-header">
                @lang('app.completed_jobs_dashboard')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">@lang('app.completed_jobs_dashboard')</li>
                    </ol>
                </div>
            </h1>
        </div>
    </div>

    <div class="row">
       
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body p-b-0">
                    <table width="100%" class="table table-striped table-bordered table-hover m-b-10 table-report">
                        <thead>
                        <tr>
                            <th width="12%">Client Name</th>
                            <th width="12%">Address</th>
                            <th width="12%">Estimator</th>
                            <th width="12%">Foreman</th>
                            <th width="12%">Signed Contract Amount</th>
                            <th width="12%">Final Contract Amount</th>
                            <th width="12%">Total Job Expenses</th>
                           <th width="12%">Profit</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($data as $client)
                         <tr>
                            <td>{!! $client->first_name!!} {!! $client->last_name!!}</td>
                            <td>{!! $client->city!!}, {!! $client->state!!}, {!! $client->zip!!}</td>
                            <td>{!! @$client->user->first_name!!} {!! @$client->user->last_name!!}</td>
                            <td>{!! $client->job_foreman!!}</td>
                            <td>{!! $client->signed_contract!!}</td>
                            <td>{!! @$client->final_job!!}</td>
                            <td>{!! $client->total_job_expenses !!}</td>
                            <td>{!! @$client->final_job-$client->total_job_expenses   !!}</td>
                          
                           </tr> 
                         @endforeach  
                        </tbody>
                    </table>
                    <div class="zero-margin">{{ $data->appends(Request::except('page'))->links() }}</div>
                </div>

            </div>

        </div>
    </div>

@endsection