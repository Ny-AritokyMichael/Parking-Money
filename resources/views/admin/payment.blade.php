@extends('admin.app.header')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 align="center">
                <i class="fa fa-money"></i> Validat* Solde
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-money"></i> Payment Data Table</h3><button type="button"
                                class="btn btn-success btn-sm" style="margin-left: 2%" data-toggle="modal"
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
                                                <h4 class="modal-title">Add Payment</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box box-primary">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">Fill In : </h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label>Select Rental Date</label>
                                                            <select class="form-control">
                                                                <option>Data</option>
                                                                <option>Data</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Select Rental Time</label>
                                                            <select class="form-control">
                                                                <option>Data</option>
                                                                <option>Data</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Payment</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Enter Payment Amount" style="width: 70%">
                                                            <div style="margin-left: 74%; margin-top: -10.5%">
                                                                <label>Add Charge</label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="00,00" style="width: 60%">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date Pay</label>
                                                            <input type="date" class="form-control">
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
                                        <th><i class="fa fa-user"></i> Name </th>
                                        <th><i class="fa fa-money"></i> Payment</th>
                                        <th><i class="fa fa-calendar"></i> Date </th>
                                        <th><i class="fa fa-keyboard-o"></i> Encode By</th>
                                        <th style="width: 11.8%"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($money as $moneys)
                                        <tr>
                                            <td>{{ $moneys->user_id }}</td>
                                            <td>{{ $moneys->money }}</td>
                                            <td>{{ $moneys->updated_at }}</td>
                                            <td align="center"><span class="btn btn-warning btn-xs">User
                                                    {{ $moneys->user_id }}</span></td>
                                            <td align="center">
                                                {{-- <button type="button" class="btn btn-primary btn-sm"
                                                    data-toggle="modal" data-target="#edit"><i
                                                        class="fa fa-pencil"></i></button> <button type="button"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                </button> --}}
                                                <form action="{{ route('valider' , ['id' =>  $moneys->user_id]) }}" method="post" enctype="multipart/form-data" >
                                                   @csrf
                                                    <button type="submit" class="btn btn-success btn-sm"><i
                                                            class="fa fa-check-square"></i></button>
                                                </form>
                                            </td>
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
                                                <h4 class="modal-title">Update Payment</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box box-warning">
                                                    <div class="box-header with-border">
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label>Select Rental Date</label>
                                                            <select class="form-control">
                                                                <option>Data</option>
                                                                <option>Data</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Select Rental Time</label>
                                                            <select class="form-control">
                                                                <option>Data</option>
                                                                <option>Data</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Payment</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Enter Payment Amount" style="width: 70%">
                                                            <div style="margin-left: 74%; margin-top: -10.5%">
                                                                <label>Add Charge</label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="00,00" style="width: 60%">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date Pay</label>
                                                            <input type="date" class="form-control">
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
                            <div class="modal fade" id="charge">
                                <div class="modal-dialog">
                                    <form role="form">
                                        <div class="modal-content"
                                            style="width: 30%;margin-left: 120%; margin-top: 40%; background-color: #0bab5f;">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
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
