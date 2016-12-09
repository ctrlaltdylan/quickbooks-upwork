@extends('layouts.app')

@section('title', trans('app.dashboard'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('app.users')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">@lang('app.users')</li>
                    </ol>
                </div>
            </h1>

            <a href="{{ route('admin.user.create') }}" class="btn btn-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add User
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
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>User Role</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td><span style="color:{{ $user->role->color }};">{{ $user->role->name }}</span></td>
                                <td>{{ $user->status }}</td>
                                <td>
                                    <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}" class="btn btn-success btn-circle">
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