@extends('admin.app.header')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 align="center">
                <i class="fa fa-cab"></i> Car Review
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
                            <h3 class="box-title"><i class="fa fa-cab"></i> Car Review Data Table</h3><button type="button"
                                class="btn btn-success btn-sm" style="margin-left: 2%" data-toggle="modal"
                                data-target="#add">
                                <i class="fa fa-plus"></i> Add
                            </button>
                            <div class="modal fade" id="add">
                                <div class="modal-dialog">
                                    <div role="form">
                                        <form action="{{ route('addCar') }}" method="post" enctype="multipart/form">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Add Car Review</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="box box-primary">
                                                        <div class="box-header with-border">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Marque du vehicule :</label>
                                                            <input type="text" class="form-control" name="marque"
                                                                placeholder="Enter Score">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Immatricule du vehicule
                                                                :</label>
                                                            <input type="text" class="form-control" name="immatricule"
                                                                placeholder="Enter Score">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"> debut de l'heure
                                                                :</label>
                                                            <input id="exampleInputEmail1" type="datetime-local" class="form-control" name="date"
                                                                placeholder="Time">
                                                        </div>


                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Numero du parking</label>
                                                                <select name="numeroParking" class="form-control">
                                                                    @foreach ($parkings as $parking)
                                                                        <option value="{{ $parking->id }}">
                                                                            {{ $parking->id }}</option>
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
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
                                        <th style="width: 15%"><i class="fa fa-user"></i> Marque</th>
                                        <th style="width: 15%"><i class="fa fa-user"></i> Numero Immatricule</th>
                                        <th style="width: 15%"><i class="fa fa-calendar"></i> Date</th>
                                        <th style="width: 15%"><i class="fa fa-user"></i> Temps estimees</th>
                                        <th style="width: 15%"><i class="fa fa-list-ol"></i> Reste</th>
                                        {{-- <th style="width: 15%"><i class="fa fa-map-marker"></i> Lieu</th> --}}
                                        <th style="width: 7.8%"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($voitures as $voiture )

                                    <tr>
                                            <td>{{ $voiture->marque }}</td>
                                            <td>{{ $voiture->numeroImmatricule }}</td>
                                            <td>{{ $voiture->dateDebut }}</td>
                                            <td>{{ $voiture->temps }}</td>
                                            <td align="center"><span class="btn btn-info btn-xs">{{ $voiture->pourcentage }} %</span></td>
                                            {{-- <td>Parking 67ha</td> --}}
                                            <td align="center"><button type="button" class="btn btn-primary btn-sm"
                                                    data-toggle="modal" data-target="#edit"><i
                                                        class="fa fa-pencil"></i></button> <button type="button"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
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
                                                <h4 class="modal-title">Update Car Review</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box box-warning">
                                                    <div class="box-header with-border">
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label>Select Costumer</label>
                                                            <select class="form-control">
                                                                <option>Chistian Jelobadola</option>
                                                                <option>Data</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Review</label>
                                                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Score</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Score">
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
