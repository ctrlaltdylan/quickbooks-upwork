<div class="col-md-6 p-0">
<div class="panel panel-default">
  <div class="panel-body">
        <div class="form-group">
          <label>Title</label>
           {!!  Form::input('text', 'title', null, ['class' => 'form-control'])  !!}
        </div>
        {!! Form::submit('Add / Edit Lead Source', array('class' => 'btn btn-primary')) !!}
  </div>
  <!-- /.panel-body --> 
</div>
</div>