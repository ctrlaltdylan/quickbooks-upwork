@extends('layouts.app')

@section('title', trans('app.edit_role'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('app.edit_role')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li><a href="{{ route('admin.role.list') }}">@lang('app.roles')</a></li>
                        <li class="active">@lang('app.edit_role')</li>
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
                <div class="panel-heading">@lang('app.edit_role')</div>
                <div class="panel-body">

                    <form id="role-form" class="form-horizontal" role="form" method="POST" action="{{ route('admin.role.edit', ['id' => $role->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('app.name')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $role->name }}" autofocus>

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
                                <textarea rows="5" id="description" class="form-control" name="description">{{ $role->description }}</textarea>

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
                                    <option value="red" @if($role->color == 'red') selected @endif>Red</option>
                                    <option value="green" @if($role->color == 'green') selected @endif>Green</option>
                                    <option value="blue" @if($role->color == 'blue') selected @endif>Blue</option>
                                    <option value="black" @if($role->color == 'black') selected @endif>Black</option>
                                </select>

                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">@lang('app.status')</label>

                            <div class="col-md-6">

                                <select id="status" class="form-control" name="status">
                                    <option value="active" @if($role->status == 'active') selected @endif>@lang('app.active')</option>
                                    <option value="inactive" @if($role->status == 'inactive') selected @endif>@lang('app.inactive')</option>
                                </select>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save" aria-hidden="true"></i>
                                    @lang('app.update')
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
    {!! JsValidator::formRequest('App\Http\Requests\Role\RoleEditRequest', '#role-form') !!}
@endsection