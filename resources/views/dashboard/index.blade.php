@extends('layouts.app')

@section('title', trans('app.dashboard'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('app.dashboard')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">@lang('app.dashboard')</li>
                    </ol>
                </div>
            </h1>
        </div>
    </div>
@endsection