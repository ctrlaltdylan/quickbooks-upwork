@extends('layouts.auth')

@section('title', trans('app.reset'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">

          

            <div class="panel panel-default">
                <div class="panel-heading">@lang('app.reset')</div>
                <div class="panel-body">
                    @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @else
                       <form id="login-form" class="form-horizontal" role="form" method="POST" action="{{ url('/sendmail') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-3 control-label">@lang('app.email')</label>

                            <div class="col-md-7">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    @lang('app.reset')
                                </button>

                                
                            </div>
                        </div>
                    </form>   
                    @endif
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
