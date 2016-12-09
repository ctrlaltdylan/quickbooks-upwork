<div class="col-md-6 p-0">
<div class="panel panel-default">
  <div class="panel-body">
        <div class="form-group">
          <label>Email</label>
           {!!  Form::input('text', 'email', null, ['class' => 'form-control'])  !!}
        </div>
        {!! Form::submit('Add / Edit Email', array('class' => 'btn btn-primary')) !!}
  </div>
  <!-- /.panel-body --> 
</div>
</div>