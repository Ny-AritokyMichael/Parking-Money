@extends('user.app.header')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 align="center">
                <i class="fa fa-money"></i> My Money
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-money"></i> Payment Data Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr style="background-color: #c5c5c5;">
                                        <th><i class="fa fa-user"></i> Name </th>
                                        <th><i class="fa fa-money"></i> My money</th>
                                        <th><i class="fa fa-calendar"></i> Date update </th>
                                        <th><i class="fa fa-keyboard-o"></i> Encode By</th>
                                        <th style="width: 11.8%"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @auth

                                        <tr>
                                            <td>{{ Auth::user()->name }}</td>
                                            <td>{{ Auth::user()->money }}</td>
                                            <td>{{ Auth::user()->updated_at }}</td>
                                            <td align="center"><span class="btn btn-warning btn-xs">user
                                                    {{ Auth::user()->id }}</span></td>
                                            <td align="center"><button type="button" class="btn btn-primary btn-sm"
                                                    data-toggle="modal" data-target="#edit"><i
                                                        class="fa fa-pencil"></i></button> <button type="button"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endauth

                                </tbody>

                            </table>
                            <div class="modal fade" id="edit">
                                <div class="modal-dialog">
                                    <div role="form">
                                        @auth
                                            <form action="{{ route('addMoney', ['id' => Auth::user()->id]) }}" method="post">

                                            @endauth
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Update money</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="box box-warning">
                                                        <div class="box-header with-border">
                                                        </div>
                                                        <div class="box-body">

                                                            <div class="form-group">
                                                                <label>Recharge</label>
                                                                <input name="money" type="number" class="form-control"
                                                                    placeholder="00,00" style="width: 60%">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <div class="modal fade" id="charge">
                            <div class="modal-dialog">
                                <form role="form">
                                    <div class="modal-content"
                                        style="width: 30%;margin-left: 120%; margin-top: 40%; background-color: #0bab5f;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label style="color:white">Add Charge</label>
                                                    <input type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"
                                                style="margin-right: 30%">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
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
