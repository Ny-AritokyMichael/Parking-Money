@extends('admin.app.header')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 align="center">
                <i class="fa fa-user-secret"></i> Client
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-cab"></i> Costumer Credential Data Table</h3><button
                                type="button" class="btn btn-success btn-sm" style="margin-left: 2%" data-toggle="modal"
                                data-target="#add">
                                <i class="fa fa-plus"></i> Add
                            </button>

                            <div class="modal fade" id="add">
                                <div class="modal-dialog">
                                    <form role="form">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Add Customer Credential</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box box-primary">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">Fill In : </h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Name</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Credential Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Select Costumer</label>
                                                            <select class="form-control">
                                                                <option>Data</option>
                                                                <option>Data</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">File</label>
                                                            <input type="file" id="exampleInputFile">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr style="background-color: #c5c5c5;">
                                        <th style="width: 30%"><i class="fa fa-file"></i> Name</th>
                                        <th><i class="fa fa-user"></i> Email</th>
                                        <th><i class="fa fa-phone"></i> Contact</th>
                                        <th style="width: 11.8%"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->contact }}</td>
                                            <td align="center"><button type="button" class="btn btn-primary btn-sm"
                                                    data-toggle="modal" data-target="#edit"><i
                                                        class="fa fa-pencil"></i></button> <button type="button"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-sm"
                                                    style="background-color:#be00e6; color:white"><i
                                                        class="fa fa-upload"></i></button></td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            <div class="modal fade" id="edit">
                                <div class="modal-dialog">
                                    <form role="form">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Update Costumer Credential</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box box-warning">
                                                    <div class="box-header with-border">
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Name</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Credential Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Select Costumer</label>
                                                            <select class="form-control">
                                                                <option>Jericho</option>
                                                                <option>Data</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">File</label>
                                                            <input type="file" id="exampleInputFile">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
