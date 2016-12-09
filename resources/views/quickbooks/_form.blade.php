<div class="col-md-6 p-0">
<div class="alert-warning">
   <p>Retrieve Access Token and Secret Token through
      <a href="https://appcenter.intuit.com/Playground/OAuth/IA">https://appcenter.intuit.com/Playground/OAuth/IA</a> <br/>
      <b>Note: Kindly set Access Token Duration to 15552000</b>
    </p>
</div>
<div class="panel panel-default">
  <div class="panel-body">
        <div class="form-group">
          <label>Consumer Key</label>
           {!!  Form::input('text', 'consumerkey', $QuickBook->consumer_key, ['class' => 'form-control','required'])  !!}
        </div>
        <div class="form-group">
          <label>Consumer Secret Key</label>
           {!!  Form::input('text', 'consumersecretkey', $QuickBook->consumer_key_secret, ['class' => 'form-control','required'])  !!}
        </div>       
        <div class="form-group">
          <label>oAuth Token</label>
           {!!  Form::input('text', 'token', $QuickBook->oauth_token, ['class' => 'form-control','required'])  !!}
        </div>  
        <div class="form-group">
          <label>oAuth Secret Token</label>
           {!!  Form::input('text', 'secrettoken', $QuickBook->oauth_token_secret, ['class' => 'form-control','required'])  !!}
        </div>   
        <div class="form-group">
          <label>Company ID</label>
           {!!  Form::input('text', 'companyId', $QuickBook->company_id, ['class' => 'form-control','required'])  !!}
        </div> 
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
  </div>
  <!-- /.panel-body --> 
</div>
</div>