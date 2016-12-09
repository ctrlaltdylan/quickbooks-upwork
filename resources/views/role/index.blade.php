@extends('layouts.app')

@section('title', trans('app.roles'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('app.roles')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">@lang('app.roles')</li>
                    </ol>
                </div>
            </h1>

            <a href="{{ route('admin.role.create') }}" class="btn btn-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add Role
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
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr class="gradeA">
                                    <td><span style="color: {{ $role->color }}">{{ $role->name }}</span></td>
                                    <td>{{ $role->description }}</td>
                                    <td>{{ $role->status }}</td>
                                    <td>
                                        <a href="{{ route('admin.role.edit', ['id' => $role->id]) }}" class="btn btn-success btn-circle">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
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
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection