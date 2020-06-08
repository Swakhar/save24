@extends('admin.includes.master-admin')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main">
                <!-- Page Heading -->
                <div class="go-title">
                    <div class="pull-right">
                        <a href="{!! url('admin/attributes/create') !!}" class="btn btn-primary btn-add"><i class="fa fa-plus"></i> Add New Attribute</a>
                    </div>
                    <h3>Attributes</h3>
                    <div class="go-line"></div>
                </div>
                <!-- Page Content -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="response">
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('message') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
                            @endif
                        </div>
                        <table class="table table-striped table-bordered" cellspacing="0" id="example" width="100%">
                            <thead>
                            <tr>
                                <th>Attribute Name</th>
                                <th>Attribute Code</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attributes as $attribute)
                                <tr>
                                    <td>{{$attribute->name}}</td>
                                    <td>{{$attribute->code}}</td>
                                    <td>
                                        <form method="POST" action="{!! action('AttributeController@destroy',['id' => $attribute->id]) !!}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <a href="attributes/{{$attribute->id}}/edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@stop
@section('footer')
@stop
