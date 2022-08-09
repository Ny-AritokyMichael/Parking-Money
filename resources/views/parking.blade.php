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
        <br>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-cab"></i> Parking Money</h3>

                            {{-- <button type="button"
                                class="btn btn-success btn-sm" style="margin-left: 2%" data-toggle="modal"
                                data-target="#add">
                                Add
                            </button>--}}

                            <form action="#" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"></button>
                            </form>

                            @foreach ($etat as $etat )
                            <h3>* free : {{ $etat->free }}   * busy : {{ $etat->busy }}  * infraction : {{ $etat->infraction  }}</h3>

                            @endforeach

                            {{-- <form action="#">
                                @csrf
                                <button type="button" class="btn btn-warning btn-sm"
                                    style="margin-left: 20%;margin-top: -93px"  data-toggle="modal"
                                    data-target="#time">
                                    <i class="fa fa-clock-o"></i>
                                </button>
                            </form> --}}

                            {{-- heure modal --}}
                            @if (session()->has('erreur'))
                            <h3 style="color: red">{{ session('erreur') }}, Mr(s) {{ Auth::user()->name }} !</h3>
                        @endif

                        @if (session()->has('error'))
                            <h3 style="color: red">{{ session('error') }}, Mr(s) {{ Auth::user()->name }} !</h3>
                        @endif

                            <div class="modal fade" id="time">
                                <div class="modal-dialog">
                                    <div role="form">
                                        <form action="{{ route('getnow') }}" method="post"
                                            enctype="multipart/form">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Get now</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="box box-primary">
                                                        <div class="box-header with-border">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Date now
                                                                :</label>
                                                                <input id="exampleInputEmail1" type="datetime-local" class="form-control"
                                                                name="date">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Time now
                                                                :</label>
                                                            <input type="time" class="form-control"
                                                                name="heure">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger pull-left"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>






                                @if ($park >= 0)
                                @foreach ($parkings as $parking)
                                    @if ($parking->type == 'free' && $parking->pourcentage == null || $parking->pourcentage> 100)
                                        <div class="col-md-6 col-lg-2 col-xlg-3">
                                            <div class="card card-hover">
                                                <h6 class="yes">
                                                    <a data-toggle="modal" data-target="#add" href="#">
                                                        <div class="box bg-cyan text-center"
                                                            style="background-color: green">
                                                            <h1 class="font-light text-white"><i
                                                                    class="mdi mdi-view-dashboard"></i>
                                                            </h1>
                                                            <h6 class="text-white" style="color: white">Numero :
                                                                {{ $parking->id }}
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ $parking->etat }}
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">0
                                                                minute(s)</h6>
                                                            <h6 class="text-white" style="color: white">
                                                                0 %</h6>
                                                        </div>
                                                        <span class="yestext">
                                                            <h5>Place Numero :
                                                                {{ App\Models\Parking::details($parking->id)[0]->numeroParking }}
                                                                <h5>Etat : <span style="color: blue">Libre</span>
                                                                </h5>

                                                        </span>
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="add">
                                            <div class="modal-dialog">
                                                <div role="form">
                                                    <form action="{{ route('addCar') }}" method="post"
                                                        enctype="multipart/form">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Add Car Review</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="box box-primary">
                                                                    <div class="box-header with-border">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Marque du vehicule
                                                                            :</label>
                                                                        <input type="text" class="form-control"
                                                                            name="marque" placeholder="Enter Score">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Immatricule du
                                                                            vehicule
                                                                            :</label>
                                                                        <input type="text" class="form-control"
                                                                            name="immatricule" placeholder="Enter Score">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">heure de
                                                                            debut
                                                                            :</label>
                                                                        <input id="exampleInputEmail1" type="datetime-local" class="form-control"
                                                                            name="date" placeholder="Time">
                                                                    </div>




                                                                    <div class="box-body">
                                                                        <div class="form-group">
                                                                            <label>Numero du parking</label>
                                                                            <select name="numeroParking"
                                                                                class="form-control">
                                                                                @foreach ($free as $frees)
                                                                                    <option value="{{ $frees->id }}">
                                                                                        {{ $frees->id }}</option>
                                                                                @endforeach
                                                                            </select>

                                                                        </div>
                                                                    </div>


                                                                    <div class="box-body">
                                                                        <div class="form-group">
                                                                            <label>Tarifs du parking</label>
                                                                            <select name="tarif" class="form-control">

                                                                                @foreach ($tarifs as $tarif)
                                                                                    <option value="{{ $tarif->id }}">
                                                                                        {{ $tarif->duree }}</option>
                                                                                @endforeach

                                                                            </select>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger pull-left"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- delete modal --}}

                                        <div class="modal fade" id="delete">
                                            <div class="modal-dialog">
                                                <div role="form">
                                                    <form action="{{ route('delete') }}" enctype="multipart/form">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Delete Car of parking</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="box box-primary">
                                                                    <div class="box-header with-border">
                                                                    </div>

                                                                    <div class="box-body">
                                                                        <div class="form-group">
                                                                            <label>Numero du parking</label>
                                                                            <select name="id" class="form-control">
                                                                                @foreach ($busy as $busyy)
                                                                                    <option value="{{ $busyy->id }}">
                                                                                        {{ $busyy->id }}</option>
                                                                                @endforeach
                                                                            </select>

                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">heure de
                                                                            depart
                                                                            :</label>
                                                                        @foreach ( $getnow as  $getnows)
                                                                        <input value="{{ $getnows->dateGetNow }}" id="exampleInputEmail1" type="datetime-local" class="form-control"
                                                                        name="date" placeholder="Time">
                                                                        @endforeach

                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger pull-left"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($parking->pourcentage < 0)
                                        <div class="col-md-6 col-lg-2 col-xlg-3">
                                            <div class="card card-hover">
                                                <h6 class="yes">
                                                    <a data-toggle="modal" data-target="#delete" href="#">
                                                        <div class="box bg-cyan text-center"
                                                            style="background-color: black">
                                                            <h1 class="font-light text-white"><i
                                                                    class="mdi mdi-view-dashboard"></i>
                                                            </h1>
                                                            <h6 class="text-white" style="color: white">Numero :
                                                                {{ $parking->id }}
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ App\Models\Parking::details($parking->id)[0]->etat }}
                                                                !
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">depassement du
                                                                delai
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">
                                                                Amende</h6>
                                                        </div>
                                                        <span class="yestext">
                                                            <h5>Place Numero :
                                                                {{ App\Models\Parking::details($parking->id)[0]->numeroParking }}
                                                                <h5>Etat : <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->etat }}
                                                                    </span>
                                                                </h5>
                                                                <h5>Numero immatricule :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->numeroImmatricule }}
                                                                    </span>
                                                                </h5>
                                                                <h5>Heure d'arrive :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->dateDebut }}</span>
                                                                </h5>
                                                                <h5>Heure reste :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->heure }} minute(s)</span>
                                                                </h5>
                                                                <h5>Reste :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->amende }} ariary</span>
                                                                </h5>
                                                                <h5>Temps de stationnement :
                                                                    <span style="color: red">delai depasser</span>
                                                                </h5>

                                                        </span>
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    @elseif($parking->pourcentage <= 25)
                                        <div class="col-md-6 col-lg-2 col-xlg-3">
                                            <div class="card card-hover">
                                                <h6 class="yes">
                                                    <a data-toggle="modal" data-target="#delete" href="#">
                                                        <div class="box bg-cyan text-center"
                                                            style="background-color: red">
                                                            <h1 class="font-light text-white"><i
                                                                    class="mdi mdi-view-dashboard"></i>
                                                            </h1>
                                                            <h6 class="text-white" style="color: white">Numero :
                                                                {{ $parking->id }}
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ App\Models\Parking::details($parking->id)[0]->etat }}
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ $parking->heure }}
                                                                minute(s)</h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ $parking->pourcentage }}%</h6>
                                                        </div>
                                                        <span class="yestext">
                                                            <h5>Place Numero :
                                                                {{ App\Models\Parking::details($parking->id)[0]->numeroParking }}
                                                                <h5>Etat : <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->etat }}</span>
                                                                </h5>
                                                                <h5>Numero immatricule :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->numeroImmatricule }}
                                                                    </span>
                                                                </h5>
                                                                <h5>Heure d'arrive :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->dateDebut }}</span>
                                                                </h5>
                                                                <h5>Temps de stationnement :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->heure }}
                                                                        minute(s)</span>
                                                                </h5>

                                                        </span>
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    @elseif($parking->pourcentage >= 25 && $parking->pourcentage <= 50)
                                        <div class="col-md-6 col-lg-2 col-xlg-3">
                                            <div class="card card-hover">
                                                <h6 class="yes">
                                                    <a data-toggle="modal" data-target="#delete" href="#">
                                                        <div class="box bg-cyan text-center"
                                                            style="background-color: orange">
                                                            <h1 class="font-light text-white"><i
                                                                    class="mdi mdi-view-dashboard"></i>
                                                            </h1>
                                                            <h6 class="text-white" style="color: white">Numero :
                                                                {{ $parking->id }}
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ App\Models\Parking::details($parking->id)[0]->etat }}
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ $parking->heure }}
                                                                minute(s)</h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ $parking->pourcentage }}%</h6>

                                                        </div>
                                                        <span class="yestext">
                                                            <h5>Place Numero :
                                                                {{ App\Models\Parking::details($parking->id)[0]->numeroParking }}
                                                                <h5>Etat : <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->etat }}</span>
                                                                </h5>
                                                                <h5>Numero immatricule :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->numeroImmatricule }}
                                                                    </span>
                                                                </h5>
                                                                <h5>Heure d'arrive :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->dateDebut }}</span>
                                                                </h5>
                                                                <h5>Temps de stationnement :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->heure }}
                                                                        minute(s)</span>
                                                                </h5>

                                                        </span>
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    @elseif($parking->pourcentage >= 50 && $parking->pourcentage <= 100)
                                        <div class="col-md-6 col-lg-2 col-xlg-3">
                                            <div class="card card-hover">
                                                <h6 class="yes">
                                                    <a data-toggle="modal" data-target="#delete" href="#">
                                                        <div class="box bg-cyan text-center"
                                                            style="background-color: rgb(192, 192, 40)">
                                                            <h1 class="font-light text-white"><i
                                                                    class="mdi mdi-view-dashboard"></i>
                                                            </h1>
                                                            <h6 class="text-white" style="color: white">Numero :
                                                                {{ $parking->id }}
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ App\Models\Parking::details($parking->id)[0]->etat }}
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ $parking->heure }}
                                                                minute(s)</h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ $parking->pourcentage }} %</h6>

                                                        </div>
                                                        <span class="yestext">
                                                            <h5>Place Numero :
                                                                {{ App\Models\Parking::details($parking->id)[0]->numeroParking }}
                                                                <h5>Etat : <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->etat }}</span>
                                                                </h5>
                                                                <h5>Numero immatricule :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->numeroImmatricule }}</span>
                                                                </h5>
                                                                <h5>Heure d'arrive :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->dateDebut }}</span>
                                                                </h5>
                                                                <h5>Temps de stationnement :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->heure }}
                                                                        minute(s)</span>
                                                                </h5>

                                                        </span>
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    @elseif($parking->pourcentage >= 75 && $parking->pourcentage <= 100 && $parking->pourcentage == 'busy')
                                        <div class="col-md-6 col-lg-2 col-xlg-3">
                                            <div class="card card-hover">
                                                <h6 class="yes">
                                                    <a data-toggle="modal" data-target="#delete" href="#">
                                                        <div class="box bg-cyan text-center"
                                                            style="background-color: green">
                                                            <h1 class="font-light text-white"><i
                                                                    class="mdi mdi-view-dashboard"></i>
                                                            </h1>
                                                            <h6 class="text-white" style="color: white">Numero :
                                                                {{ $parking->id }}
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ App\Models\Parking::details($parking->id)[0]->etat }}
                                                            </h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ $parking->heure }}
                                                                minute(s)</h6>
                                                            <h6 class="text-white" style="color: white">
                                                                {{ $parking->pourcentage }} %</h6>

                                                        </div>
                                                        <span class="yestext">
                                                            <h5>Place Numero :
                                                                {{ App\Models\Parking::details($parking->id)[0]->numeroParking }}
                                                                <h5>Etat : <span
                                                                        style="color: blue">{{ $parking->etat }}</span>
                                                                </h5>
                                                                <h5>Numero immatricule :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->numeroImmatricule }}
                                                                        minute(s)</span>
                                                                </h5>
                                                                <h5>Heure d'arrive :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->dateDebut }}</span>
                                                                </h5>
                                                                <h5>Temps de stationnement :
                                                                    <span
                                                                        style="color: blue">{{ App\Models\Parking::details($parking->id)[0]->heure }}
                                                                        minute(s)</span>
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
