@extends('layouts.app')

@section('title', trans('app.create_mailtpls'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('app.create_mailtpls')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li><a href="{{ route('admin.role.list') }}">@lang('app.mailtpls')</a></li>
                        <li class="active">@lang('app.create_mailtpls')</li>
                    </ol>
                </div>
            </h1>

            @if($errors->first())
                <div class="alert alert-danger alert-notification" role="alert">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <strong>{{ $errors->first() }}</strong>
                </div>
            @endif

        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-8">

            <div class="panel panel-default">
                <div class="panel-heading">@lang('app.create_mailtpls')</div>
                <div class="panel-body">

                    <form id="role-form" class="form-horizontal" role="form" method="POST" action="{{ url('emailtpls/store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('template_name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('app.name')</label>

                            <div class="col-md-6">
                                <input id="template_name" type="text" class="form-control" name="template_name" value="{{ old('template_name') }}" autofocus>

                                @if ($errors->has('template_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('template_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('app.subject')</label>

                            <div class="col-md-6">
                                <input id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}" autofocus>

                                @if ($errors->has('subject'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">@lang('app.body')</label>

                            <div class="col-md-6">
                                <textarea rows="5" id="body" class="form-control" name="body">{{ old('body') }}</textarea>

                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save" aria-hidden="true"></i>
                                    @lang('app.save')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        
        
        <div class="col-lg-4 col-md-4">

            <div class="panel panel-default">
                <div class="panel-heading">@lang('app.email_variables')</div>
                <div class="panel-body">
                   <ul>
                     @foreach($variables as $variable)
                       <li>{!! $variable->name !!}</li>
                     @endforeach
                   </ul>
                    
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Role\RoleCreateRequest', '#role-form') !!}
@endsection