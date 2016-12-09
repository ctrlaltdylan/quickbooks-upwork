@extends('layouts.app')

@section('title', trans('app.mailtpls'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('app.mailtpls')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">@lang('app.mailtpls')</li>
                    </ol>
                </div>
            </h1>

            <a href="{{ url('/emailtpls/create') }}" class="btn btn-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add @lang('app.mailtpls')
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
                            <th>Subject</th>
                          
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($mailtpl as $tpl)
                                <tr class="gradeA">
                                    <td>{{ $tpl->template_name }}</td>
                                    <td>{{ $tpl->subject }}</td>
                                    <td>
                                        <a href="{!! url('/emailtpls/edit/'.$tpl->id ) !!}" class="btn btn-success btn-circle">
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