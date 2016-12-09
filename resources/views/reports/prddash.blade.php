@extends('layouts.app')

@section('title', trans('app.audit'))

@section('content')
    <div class="row">
        <div class="col-lg-12 p-0">
            <h1 class="page-header">
                @lang('app.audit')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">@lang('app.audit')</li>
                    </ol>
                </div>
            </h1>
        </div>
    </div>

    <div class="row">

     {!! Form::model($req,['method' =>'GET','url' => 'audit']) !!}
       <div class="col-lg-3 p-0">
             <div class="panel panel-default">
              <div class="panel-heading">Search & Filters</div>
                <div class="panel-body p-b-0">
                    <table width="100%" class="table table-striped table-bordered  m-b-10">
                       <tr>
                        <td> {!! Form::select('section', $sections, null, ['class' => 'form-control']) !!}</td>
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
                            <th width="9%">Id</th>
                            <th width="23%">Page</th>
                            <th width="23%">Action</th>
                            <th width="23%">User</th>
                            <th width="22%">Date</th>
                           
                            
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($audits as $audit)
                         <tr>
                            <td>{!! $audit->id!!} </td>
                            <td>{!! $audit->page!!}</td>
                            <td>{!! $audit->action!!}</td>
                            <td>{!! $audit->user->first_name!!}&nbsp;{!! $audit->user->last_name!!}</td>
                          <td>{!! $audit->created_at->format('d-m-Y, H:i A')!!}</td>
                           </tr> 
                         @endforeach  
                        </tbody>
                    </table>
                    <div class="zero-margin">{{ $audits->appends(Request::except('page'))->links() }}</div>
                </div>

            </div>

        </div>
    </div>

@endsection