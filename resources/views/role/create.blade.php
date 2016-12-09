@extends('layouts.app')

@section('title', trans('app.create_role'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('app.create_role')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li><a href="{{ route('admin.role.list') }}">@lang('app.roles')</a></li>
                        <li class="active">@lang('app.create_role')</li>
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
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">@lang('app.create_role')</div>
                <div class="panel-body">

                    <form id="role-form" class="form-horizontal" role="form" method="POST" action="{{ route('admin.role.create') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('app.name')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">@lang('app.description')</label>

                            <div class="col-md-6">
                                <textarea rows="5" id="description" class="form-control" name="description">{{ old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color" class="col-md-4 control-label">@lang('app.color')</label>

                            <div class="col-md-6">

                                <select id="color" class="form-control" name="color">
                                    <option value="red" @if(old('color') == 'red') selected @endif>Red</option>
                                    <option value="green" @if(old('color') == 'green') selected @endif>Green</option>
                                    <option value="blue" @if(old('color') == 'blue') selected @endif>Blue</option>
                                    <option value="black" @if(old('color') == 'black') selected @endif>Black</option>
                                </select>

                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
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
    </div>

@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Role\RoleCreateRequest', '#role-form') !!}
@endsection