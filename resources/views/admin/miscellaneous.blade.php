@extends('admin.includes.master-admin')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main">

                <!-- Page Heading -->
                <div class="go-title">
                    <h3>Miscellaneous</h3>

                </div>
                <!-- Page Content -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="res">
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        </div>
                        <!-- /.start -->
                        <div class="col-md-12">
                            <ul class="nav nav-tabs tabs-left">
                                <li class="active"><a href="#industry" data-toggle="tab" aria-expanded="false"><strong>Related Industries/Insttutions</strong></a></li>
                            </ul>
                        </div>

                        <div class="col-xs-12" style="padding: 0">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="industry">
                                    <div class="go-title">
                                        <div class="pull-right">
                                            <a href="{!! url('admin/miscellaneous/create') !!}" class="btn btn-primary btn-add"><i class="fa fa-plus"></i> Add Industry/Institution</a>
                                        </div>
                                        <h3>Industry/Institution</h3>
                                        <div class="go-line"></div>
                                    </div>
                                    <!-- Page Content -->
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered" cellspacing="0" id="example" width="100%">
                                                <thead>
                                                <tr>
                                                    <th> Id</th>
                                                    <th> Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($inds as $ind)
                                                    <tr>
                                                        <td>{{$ind->ind_id}}
                                                        </td>
                                                        <td>{{$ind->name}}</td>
                                                        <td>
                                                            <a href="miscellaneous/{{$ind->id}}/edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit </a>
                                                            <a href="javascript:;" data-href="{{url('/')}}/admin/miscellaneous/delete/{{$ind->id}}" data-toggle="modal" data-target="#confirm-delete"class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</a><br>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.end -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->



    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <p>You are about to delete this Item, Everything will be deleted under this Item.</p>
                    <p>Do you want to proceed?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
@stop