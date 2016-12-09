@extends('layouts.app')

@section('title', trans('app.estimators_dashboard'))

@section('content')
    <div class="row">
        <div class="col-lg-12 p-0">
            <h1 class="page-header">
                @lang('app.estimators_dashboard')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">@lang('app.estimators_dashboard')</li>
                    </ol>
                </div>
            </h1>
        </div>
    </div>

    <div class="row">

     {!! Form::model($req,['method' =>'GET','url' => 'estimators_dashboard']) !!}
       <div class="col-lg-3 p-0">
             <div class="panel panel-default">
              <div class="panel-heading">Search & Filters</div>
                <div class="panel-body p-b-0">
                    <table width="100%" class="table table-striped table-bordered  m-b-10">
                       <tr>
                        <td> {!! Form::select('estimator[]', $estimator, null, ['class' => 'form-control select2','multiple']) !!}</td>
                       </tr>
                       
                       <tr>
                        <td> 
                           {!!  Form::input('text', 'date', null, ['class' => 'form-control date'])  !!} 
                        </td>
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
                            <th width="9%">Estimator</th>
                            <th width="23%">Total Signed Leads</th>
                            <th width="23%">Total Signed Contract Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($data as $info)
                         <tr>
                            <td>{!! @$info->user->first_name!!} {!! @$info->user->last_name!!}</td>
                            <td>{!! $info->total_signed_leads !!}</td>
                            <td>{!! $info->total_signed_contract !!}</td>
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

@push('css')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endpush

@push('javascript')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 <script type="text/javascript">
   $('.select2').select2();
   
   $( document ).ready(function() {
	   $('.date').datepicker({
			format: "mm-yyyy",
			viewMode: "months", 
			minViewMode: "months",
			autoclose: true,
	  });
  });
</script>
 </script>
@endpush