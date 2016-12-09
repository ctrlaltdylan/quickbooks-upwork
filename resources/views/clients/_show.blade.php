
<div class="panel panel-default">
  <div class="panel-heading"> Client Record </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-xs-2">
        <div class="form-group">
          <label>Status <i class="fa fa-star text-danger" aria-hidden="true"></i>
</label>
          {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
        </div>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-xs-3">
        <div class="form-group">
          <label for="first_name">First Name <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
           {!! Form::input('text', 'first_name', null, ['class' => 'form-control','required']) !!}
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="last_name">Last Name <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
            {!! Form::input('text', 'last_name', null, ['class' => 'form-control','required']) !!}
            
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="phone">Phone <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
          {!! Form::input('text', 'phone', null, ['class' => 'form-control','required']) !!}
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="email">Email</label>
         {!! Form::input('text', 'email', null, ['class' => 'form-control']) !!}
        </div>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-xs-6">
        <div class="form-group">
          <label for="address_1">Address 1 <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
          {!! Form::input('text', 'address1', null, ['class' => 'form-control','required']) !!}
        </div>
      </div>
      <div class="col-xs-6">
        <div class="form-group">
          <label for="address_2">Address 2</label>
           {!!  Form::input('text', 'address2', null, ['class' => 'form-control'])  !!}
        </div>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-xs-3">
        <div class="form-group">
          <label for="city">City <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
           {!!  Form::input('text', 'city', null, ['class' => 'form-control','required'])  !!}
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="state">State <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
           {!!  Form::input('text', 'state', null, ['class' => 'form-control','required'])  !!}
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="zip">Zip <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
           {!!  Form::input('text', 'zip', null, ['class' => 'form-control','required'])  !!}
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="qb">Check QB</label>
             {!! Form::select('chk_q_b', ['1'=>'Yes','0'=>'No'], null, ['class' => 'form-control','id'=>'lead_type']) !!}
        </div>
      </div>
    </div>
    <!-- /.row --> 
  </div>
  <!-- /.panel-body --> 
</div>
<!-- /.panel -->
<div class="panel panel-default">
  <div class="panel-heading"> Lead </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-xs-4">
        <div class="form-group">
          <label>Lead Type <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
          {!! Form::select('lead_type', $lead_type, null, ['class' => 'form-control','id'=>'lead_type']) !!}
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label>Lead Date</label>
          {!! Form::input('text','lead_date', null, ['class' => 'form-control date_fld','id'=>'lead_date','placeholder'=>'dd-mm-yyyy'])  !!}
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label>Lead Source <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
          {!! Form::select('lead_source', $lead_source, null, ['class' => 'form-control','id'=>'lead_source']) !!}
        </div>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-xs-6">
        <div class="form-group">
          <label for="lead_comments">Lead Comments</label>
          {!!  Form::textarea('lead_comments', null, ['size' => '1x3','class' => 'form-control','id'=>'lead_comments'])  !!}
        </div>
      </div>
    </div>
    <!-- /.row --> 
  </div>
  <!-- /.panel-body --> 
</div>
<!-- /.panel -->
<div class="panel panel-default">
  <div class="panel-heading"> Estimate </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-xs-4">
        <div class="form-group">
          <label for="scope">Scope <i class="fa fa-star text-danger" aria-hidden="true"></i></label>
          {!!  Form::input('text', 'scope', null, ['class' => 'form-control','id'=>'scope'])  !!}
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="estimate">Estimate / JOB#</label>
          {!!  Form::input('text', 'estimate', null, ['class' => 'form-control','id'=>'estimate'])  !!}
        </div>
      </div>
    </div>
    <!-- /.row -->
    
    <div class="row">
      <div class="col-xs-4">
        <div class="form-group">
          <label for="estimator">Estimator</label>
           {!! Form::select('estimator',$estimators , null, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="original_est">Original Est. $</label>
          {!!  Form::input('text', 'original_est', null, ['class' => 'form-control','id'=>'original_est'])  !!}
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="original_est_date">Original Est. Date</label>
          {!! Form::input('text','original_est_date', null, ['class' => 'form-control date_fld','id'=>'original_est_date','placeholder'=>'dd-mm-yyyy'])  !!}
        </div>
      </div>
    </div>
    <!-- /.row --> 
  </div>
  <!-- /.panel-body --> 
</div>
<!-- /.panel -->
<div class="panel panel-default">
  <div class="panel-heading"> Appointments </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-xs-4">
        <div class="form-group">
          <label for="appointment_date">Appointment Date</label>
          {!! Form::input('text','appointment_date', null, ['class' => 'form-control date_fld','id'=>'appointment_date','placeholder'=>'dd-mm-yyyy '])  !!}
        </div>
      </div>
     
     <div class="col-xs-4">
        <div class="form-group">
          <label for="appointment_date">Appointment Time</label>
          {!! Form::input('text','appointment_time', null, ['class' => 'form-control time_fld','id'=>'appointment_time','placeholder'=>''])  !!}
        </div>
      </div>
    </div>
    <!-- /.row -->
    
    <div class="row">
      <div class="col-xs-4">
        <div class="form-group">
          <label for="days_till_meeting"># Days Till Meeting</label>
          {!!  Form::input('text', 'days_till_meeting', null, ['class' => 'form-control','id'=>'days_till_meeting'])  !!}
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="days_till_submitting_est"># Days Till Submitting Est.</label>
          {!!  Form::input('text', 'days_till_submitting_est', null, ['class' => 'form-control','id'=>'days_till_submitting_est'])  !!}
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="days_till_contract_signed"># Days Till Contract Signed</label>
          {!!  Form::input('text', 'days_till_contract_signed', null, ['class' => 'form-control','id'=>'days_till_contract_signed'])  !!}
        </div>
      </div>
    </div>
    <!-- /.row --> 
  </div>
  <!-- /.panel-body --> 
</div>
<!-- /.panel -->
<div class="panel panel-default">
  <div class="panel-heading"> Follow Up </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-xs-4">
        <div class="form-group">
          <label for="follow_up_date">Follow Up Date</label>
          {!! Form::input('text','follow_up_date', null, ['class' => 'form-control date_fld','id'=>'follow_up_date','placeholder'=>'dd-mm-yyyy'])  !!}
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="notes">Notes</label>
          {!!  Form::textarea('notes', null, ['size' => '1x3','class' => 'form-control','id'=>'notes'])  !!}
        </div>
      </div>
    </div>
    <!-- /.row --> 
    
  </div>
  <!-- /.panel-body --> 
</div>
<!-- /.panel -->

<div class="panel panel-default">
  <div class="panel-heading"> Contract </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-xs-4">
        <div class="form-group">
          <label for="signed_contract_date">Signed Contract Date</label>
          {!! Form::input('text','signed_contract_date', null, ['class' => 'form-control date_fld','id'=>'signed_contract_date','placeholder'=>'dd-mm-yyyy'])  !!}
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="signed_contract">Signed Contract $</label>
          {!!  Form::input('text', 'signed_contract', null, ['class' => 'form-control','id'=>'signed_contract'])  !!}
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="final_job">Final Job</label>
          {!!  Form::input('text', 'final_job', null, ['class' => 'form-control','id'=>'final_job'])  !!}
        </div>
      </div>
    </div>
    <!-- /.row --> 
    
  </div>
  <!-- /.panel-body --> 
</div>
<!-- /.panel -->
<div class="panel panel-default">
  <div class="panel-heading"> Production </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-xs-3">
        <div class="form-group">
          <label for="start_date">Start Date</label>
          {!! Form::input('text','start_date', null, ['class' => 'form-control date_fld','id'=>'start_date','placeholder'=>'dd-mm-yyyy'])  !!}
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="handover_date">Handover Date</label>
          {!! Form::input('text','handover_date', null, ['class' => 'form-control date_fld','id'=>'handover_date','placeholder'=>'dd-mm-yyyy'])  !!}
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="given_to_prod_date">Given to Prod. Date</label>
          {!! Form::input('text','given_to_prod_date', null, ['class' => 'form-control date_fld','id'=>'given_to_prod_date','placeholder'=>'dd-mm-yyyy'])  !!}
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="job_foreman">Job Foreman</label>
          {!! Form::select('job_foreman', ['job_foreman 1' => 'job_foreman 1', 'job_foreman 2' => 'job_foreman 2'], null, ['class' => 'form-control','id'=>'job_foreman']) !!}
        </div>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-xs-3">
        <div class="form-group">
          <label for="original_projected_end_date">Original Projected End Date</label>
          {!! Form::input('text','original_projected_end_date', null, ['class' => 'form-control date_fld','id'=>'original_projected_end_date','placeholder'=>'dd-mm-yyyy'])  !!}
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="adjusted_end_date">Adjusted End Date</label>
          {!! Form::input('text','adjusted_end_date', null, ['class' => 'form-control date_fld','id'=>'adjusted_end_date','placeholder'=>'dd-mm-yyyy'])  !!}
        </div>
      </div>
      
      <div class="col-xs-3">
        <div class="form-group">
          <label for="actual_end_date">Actual End Date</label>
          {!! Form::input('text','actual_end_date', null, ['class' => 'form-control date_fld','id'=>'actual_end_date','placeholder'=>'dd-mm-yyyy'])  !!}
        </div>
      </div>
      
      <div class="col-xs-3">
        <div class="form-group">
          <label for="actual_end_date">Total Job Expenses </label>
          {!! Form::input('text','total_job_expenses', null, ['class' => 'form-control','id'=>'actual_end_date','placeholder'=>'Total Job Expenses'])  !!}
        </div>
      </div>
      
    </div>
    <!-- /.row --> 
    
  </div>
  <!-- /.panel-body --> 
</div>
<!-- /.panel -->

@push('javascript')

<script>
$( document ).ready(function() {
   
$("body :input").attr("disabled", true);  
});
</script>
@endpush
