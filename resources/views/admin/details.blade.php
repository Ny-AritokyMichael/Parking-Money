@extends('admin.app.header')


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
                                Add
                            </button>

                            <form action="{{ route('plusUn') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    style="margin-left: 16%;margin-top: -53px">
                                    <i class="fa fa-plus"></i>
                                </button>
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
                                <div class="modal fade" id="green">
                                    <div class="modal-dialog">
                                        <div role="form">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Green</h4>
                                                </div>
                                                <form action="{{ route('ajout', ['id'=> $parking->id ]) }}">
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


                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <h6 class="yes">
                                                <a data-toggle="modal"
                                                data-target="#green" href="{{ route('ajout', ['id'=> $parking->id ]) }}">
                                                <div class="box bg-cyan text-center" style="background-color: green">
                                                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>
                                                    </h1>
                                                    <h6 class="text-white" style="color: white">Numero :
                                                        {{ $parking->id }}
                                                    </h6>
                                                    <h6 class="text-white" style="color: white">{{ $parking->type }}
                                                    </h6>
                                                    <h6 class="text-white" style="color: white">0
                                                        minute(s)</h6>
                                                    <h6 class="text-white" style="color: white">
                                                        0 %</h6>
                                                </div>
                                                <span class="yestext">
                                                    <h5>Place Numero
                                                        {{ App\Models\Parking::details($parking->id)[0]->numeroParking }}
                                                        <h5>Etat <span style="color: blue">Libre</span>
                                                        </h5>

                                                </span>
                                            </a>
                                            </h6>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 col-lg-3 col-xlg-3">

                                        <div class="card card-hover">
                                                <div class="box bg-cyan text-center" style="background-color: green">
                                                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>
                                                    </h1>
                                                    <h6 class="text-white" style="color: white">Numero :
                                                        {{ $parking->id }}
                                                    </h6>
                                                    <h6 class="text-white" style="color: white">{{ $parking->type }}
                                                    </h6>
                                                    <h6 class="text-white" style="color: white">0</h6>

                                                </div>


                                        </div>
                                    </div> --}}
                                @elseif($parking->pourcentage < 0)
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <h6 class="yes">
                                                <a href="{{ route('ajout', ['id'=> $parking->id ]) }}">
                                                <div class="box bg-cyan text-center" style="background-color: black">
                                                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>
                                                    </h1>
                                                    <h6 class="text-white" style="color: white">Numero :
                                                        {{ $parking->id }}
                                                    </h6>
                                                    <h6 class="text-white" style="color: white">infraction !
                                                    </h6>
                                                    <h6 class="text-white" style="color: white">depassement du delai</h6>
                                                    <h6 class="text-white" style="color: white">
                                                        Amende</h6>
                                                </div>
                                                <span class="yestext">
                                                    <h5>Place Numero
                                                        {{ App\Models\Parking::details($parking->id)[0]->numeroParking }}
                                                        <h5>Etat <span style="color: blue">Infraction</span>
                                                        </h5>

                                                </span>
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                @elseif($parking->pourcentage < 25)
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <h6 class="yes">
                                                <a href="{{ route('ajout', ['id'=> $parking->id ]) }}">
                                            <div class="box bg-cyan text-center" style="background-color: red">
                                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>
                                                </h1>
                                                <h6 class="text-white" style="color: white">Numero :
                                                    {{ $parking->id }}
                                                </h6>
                                                <h6 class="text-white" style="color: white">{{ $parking->type }}
                                                </h6>
                                                <h6 class="text-white" style="color: white">{{ $parking->heure }}
                                                    minute(s)</h6>
                                                <h6 class="text-white" style="color: white">
                                                    {{ $parking->pourcentage }}%</h6>
                                            </div>
                                            <span class="yestext">
                                                <h5>Place Numero
                                                    {{ App\Models\Parking::details($parking->id)[0]->numeroParking }}
                                                    <h5>Etat <span style="color: blue">Libre</span>
                                                    </h5>

                                            </span>
                                            </a>
                                        </h6>
                                        </div>
                                    </div>
                                @elseif($parking->pourcentage > 25 && $parking->pourcentage < 50)
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <h6 class="yes">
                                                <a href="{{ route('ajout', ['id'=> $parking->id ]) }}">
                                            <div class="box bg-cyan text-center" style="background-color: orange">
                                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>
                                                </h1>
                                                <h6 class="text-white" style="color: white">Numero :
                                                    {{ $parking->id }}
                                                </h6>
                                                <h6 class="text-white" style="color: white">
                                                    {{ $parking->type }}</h6>
                                                <h6 class="text-white" style="color: white">
                                                    {{ $parking->heure }}
                                                    minute(s)</h6>
                                                <h6 class="text-white" style="color: white">
                                                    {{ $parking->pourcentage }}%</h6>

                                            </div>
                                            <span class="yestext">
                                                <h5>Place Numero
                                                    {{ App\Models\Parking::details($parking->id)[0]->numeroParking }}
                                                    <h5>Etat <span style="color: blue">Libre</span>
                                                    </h5>

                                            </span>
                                            </a>
                                        </h6>
                                        </div>
                                    </div>
                                @elseif($parking->pourcentage > 50 && $parking->pourcentage < 100)
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <h6 class="yes">
                                                <a href="{{ route('ajout', ['id'=> $parking->id ]) }}">
                                            <div class="box bg-cyan text-center"
                                                style="background-color: rgb(192, 192, 40)">
                                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>
                                                </h1>
                                                <h6 class="text-white" style="color: white">Numero :
                                                    {{ $parking->id }}
                                                </h6>
                                                <h6 class="text-white" style="color: white">
                                                    {{ $parking->type }}
                                                </h6>
                                                <h6 class="text-white" style="color: white">
                                                    {{ $parking->heure }}
                                                    minute(s)</h6>
                                                <h6 class="text-white" style="color: white">
                                                    {{ $parking->pourcentage }} %</h6>

                                            </div>
                                            <span class="yestext">
                                                <h5>Place Numero
                                                    {{ App\Models\Parking::details($parking->id)[0]->numeroParking }}
                                                    <h5>Etat <span style="color: blue">Libre</span>
                                                    </h5>

                                            </span>
                                            </a>
                                        </h6>
                                        </div>
                                    </div>
                                @elseif($parking->heure > 15)
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <h6 class="yes">
                                                <a href="{{ route('ajout', ['id'=> $parking->id ]) }}">
                                            <div class="box bg-cyan text-center" style="background-color: green">
                                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>
                                                </h1>
                                                <h6 class="text-white" style="color: white">Numero :
                                                    {{ $parking->id }}
                                                </h6>
                                                <h6 class="text-white" style="color: white">
                                                    {{ $parking->type }}
                                                </h6>
                                                <h6 class="text-white" style="color: white">
                                                    {{ $parking->heure }}
                                                    minute(s)</h6>
                                                <h6 class="text-white" style="color: white">
                                                    {{ $parking->pourcentage }} %</h6>

                                            </div>
                                            <span class="yestext">
                                                <h5>Place Numero
                                                    {{ App\Models\Parking::details($parking->id)[0]->numeroParking }}
                                                    <h5>Etat <span style="color: blue">Libre</span>
                                                    </h5>

                                            </span>
                                            </a>
                                        </h6>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <h2>Le parking est vide</h2>
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
