

@extends('user.app.header')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 align="center">
                <i class="fa fa-cab"></i> Parking Review
                <small></small>
                <h1 style="margin-left: 675px">
                    <div id="heure"></div>
                </h1>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-cab"></i> Parking Money</h3><button type="button"
                                class="btn btn-success btn-sm" style="margin-left: 2%" data-toggle="modal"
                                data-target="#add">
                                <i class="fa fa-plus"></i> Add
                            </button>

                            <form action="{{ route('add') }}" method="post">
                                @csrf
                                <input type="hidden" value="0">
                                <button  type="submit" class="btn btn-primary"><i class="fa fa-spinner fa-spin"></i></button>
                            </form>



                            <div class="modal fade" id="add">
                                <div class="modal-dialog">
                                    <div role="form">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Parking Number</h4>
                                            </div>
                                            <form action="{{ route('add') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="box box-primary">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="nombre"
                                                                    placeholder="Combien de parking">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger pull-left"
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
                        </div>

                        @if ($park >= 0)
                            @foreach ($parkings as $parking)
                                @if ($parking->type == 'free')
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <br>
                                            <div class="box bg-cyan text-center" style="background-color: green">
                                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>
                                                </h1>
                                                <h6 class="text-white" style="color: white">Numero : {{ $parking->id }}
                                                </h6>
                                                <h6 class="text-white" style="color: white">{{ $parking->type }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <br>
                                            <div class="box bg-cyan text-center" style="background-color: red">
                                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>
                                                </h1>
                                                <h6 class="text-white" style="color: white">Numero : {{ $parking->id }}
                                                </h6>
                                                <h6 class="text-white" style="color: white">{{ $parking->type }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <h2>Le parking est vide</h2>
                            <p>asdfbqasfcvonasvbaonfcaoscno</p>
                        @endif

                        <!-- /.box-header -->
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
