@extends('layouts.app')

@section('title', trans('app.pe'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('app.pe')

                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard') }}">@lang('app.home')</a></li>
                        <li class="active">@lang('app.pe')</li>
                    </ol>
                </div>
            </h1>

            <a href="{{ url('/pe/create') }}" class="btn btn-success pull-right m-b-10">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add @lang('app.pe')
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
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                            <th width="10%">Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

@endsection

@include('common.common')

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
				   responsive: true,
				   processing: true,
				   serverSide: true,
				   ajax: '/pe/data',
				   dom: 'Bfrtip',
				   pageLength: '50',
				   buttons: [
					  'colvis','copy', 'csv', 'excel', 'pdfHtml5', 'print'
				   ],
				   columns: [
								{ data: 'id', name: 'id' },
								{ data: 'email', name: 'email' },
								{ data: 'action', "orderable":false }
							]
           });
        });
    </script>
@endsection