@extends('layouts.app')

@section('title', trans('app.clients'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('app.clients')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">@lang('app.clients')</li>
                    </ol>
                </div>
            </h1>

            <a href="{{ url('/clients/create') }}" class="btn btn-success pull-right m-b-10">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add @lang('app.clients')
            </a>

            @if( Session::has('success'))
                <div class="alert alert-success alert-notification" role="alert">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <strong>{{ Session::get('success') }}</strong>
                </div>
            @endif

        </div>
    </div>

    <div class="row">

     {!! Form::model($req,['method' =>'GET','url' => 'clients']) !!}
       <div class="col-lg-12">
             <div class="panel panel-default">
              <div class="panel-heading">Search & Filters</div>
                <div class="panel-body p-b-0">
                    <table width="100%" class="table table-striped table-bordered  m-b-10">
                       <tr>
                        <td>
                           <label for="name">Client Name</label>
                         {!!  Form::input('text', 'name',null, ['class' => 'form-control clear','placeholder'=>'Client Name'])  !!}
                         </td>
                        <td>
                           <label for="csz">City, State, Zip</label>
                          {!!  Form::input('text', 'address', null, ['class' => 'form-control clear','placeholder'=>'city,state,zip'])  !!}
                        </td>
                        <td>
                          <label for="jn">Job Number</label>
                          {!!  Form::input('text', 'job', null, ['class' => 'form-control clear','placeholder'=>'Job Number'])  !!}
                         </td>
                        <td>
                         <label for="jn">Status</label>
                        {!! Form::select('status', $status, null, ['class' => 'form-control select']) !!}
                        </td>
                       </tr>

                       <tr>
                        <td>
                           <label for="name">Lead Date (grouped by Month)</label>
                         {!!  Form::input('text', 'date',null, ['class' => 'form-control date clear','placeholder'=>'Lead Date'])  !!}
                         </td>
                        <td>
                           <label for="csz">Lead Type</label>
                           {!! Form::select('lead_type', $lead_type, null, ['class' => 'form-control select','id'=>'lead_type']) !!}
                        </td>
                        <td>
                          <label for="jn">Estimator</label>
                          {!! Form::select('estimator',$estimators , null, ['class' => 'form-control select']) !!}
                         </td>
                        <td>
                         <label for="jn">Lead Source</label>
                        {!! Form::select('lead_source', $lead_source, null, ['class' => 'form-control select','id'=>'lead_source']) !!}
                        </td>
                       </tr>
                       
                        <tr>
                        <td colspan="4">
                           {!! Form::submit('Search',['class' => 'btn btn-success']) !!} 
                           {!! Form::reset('Clear', ['class' => 'btn btn-success reset']) !!}
                           </td>
                       
                       </tr>
                    </table>
                </div>
             </div>
       </div>
       {!! Form::close() !!}   
       
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body p-b-0">
                    <table  class="table table-striped table-bordered table-hover m-b-10" id="dataTables-example">
                        <thead>
                        <tr>
                        <th>Lead Date</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone#</th>
                            <th>Email</th>
                            
                            <th>Lead Type</th>
                            <th>Lead Source</th>
                            <th>Scope</th>
                            <th>Estimator</th>
                            <th>App Date</th>
                            
                            <th width="10%">Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($clients as $client)
                         <tr>
                            <td>{!! $client->lead_date !!}</td>
                            <td>{!! $client->first_name!!} {!! $client->last_name!!}</td>
                            <td>{!! $client->city!!}, {!! $client->state!!}, {!! $client->zip!!}</td>
                            <td>{!! $client->phone!!}</td>
                            <td>{!! $client->email!!}</td>
                            <td>{!! $client->lead_type!!}</td>
                            <td>{!! $client->lead_source!!}</td>
                            <td>{!! $client->scope!!}</td>
                            <td>{!! @$client->user->first_name!!} {!! @$client->user->last_name!!}</td>
                            <td>{!! $client->appointment_date!!}</td>
                            
                            <td width="6%">
                                <a href="/clients/{{$client->id}}/edit/" class="btn btn-success btn-circle">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                 <a href="/clients/{{$client->id}}" class="btn btn-success btn-circle">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>        
                            </td> 
                           </tr> 
                         @endforeach  
                        </tbody>
                    </table>
                   
                </div>

            </div>

        </div>
    </div>

@endsection

@section('scripts')
 <script>
  $(document).ready(function() {
		$('#dataTables-example').DataTable({});
 	    $('.date').datepicker({
			format: "mm-yyyy",
			viewMode: "months", 
			minViewMode: "months",
			autoclose: true,
	    });
	  
	  $('.reset').click(function(){
		  
		   $('.clear').attr("value", ""); 
		   $('.select option:selected').attr("selected",null);
		   $('.select option[value=""]').attr("selected","selected");
	  });	
		
  });
</script>
@endsection