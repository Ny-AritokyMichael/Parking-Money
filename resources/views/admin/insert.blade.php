@extends('admin.app.header')


@section('content')
    <div class="span9">
        <div class="content">

            <div class="module">
                <div class="module-head">
                    <h2>Ajouter une nouvelle vehicule dans le parking </h2>
                </div>
                <div class="module-body">


                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Oh snap!</strong> Whats wrong with you?
                    </div>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Well done!</strong> Now you are listening me :
                    </div>

                    <br />

                    <form class="form-horizontal row-fluid" method="post" action="{{ route('ajouter-produit-recette') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-group--inline">
                            <label>Nom du chauffeurs<span>*</span></label>
                            <input class="form-control" type="text" name="nom">
                        </div>

                        <div class="form-group form-group--inline">
                            <label>Numero d'Immatriculation<span>*</span></label>
                            <input class="form-control" type="text"  name="numeroImmatricule">
                        </div>



                        <div class="form-group form-group--inline">
                            <label>Emplacement <span>*</span></label>
                            <select class="ps-select selectpicker" name="emplacement">
                                <option value="">numero 1</option>
                                <option value="">numero 2</option>
                                <option value="">numero 3</option>
                            </select>
                        </div>


                        <div class="form-group form-group--inline">
                            <label>Temps du parking <span>*</span></label>
                            <select class="ps-select selectpicker" name="temps">
                                <option value="  ">15 min</option>
                                <option value="  ">30 min</option>
                                <option value="  ">1 heure</option>
                            </select>
                        </div>




                        <div class="form-group form-group--inline">
                            <br>
                            <button type="submit" class="btn btn-primary">Ajouter le produit<i
                                    class="ps-icon-next"></i></button>
                        </div>
                    </form>
                    <br>
                    <br>

                    <table cellpadding="0" cellspacing="0" border="0"
                        class="datatable-1 table table-bordered table-striped	 display" width="100%">
                        <thead>
                            <tr>
                                <th>Nom du chauffeur</th>
                                <th>Numero Immatriculation</th>
                                <th>Emplacement du voiture</th>
                                <th>Tarifs du parking</th>
                                <th>Renouveller</th>
                            </tr>l
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-size: 24px;"> x </td>
                                <td style="font-size: 24px;"> x </td>
                                <td style="font-size: 24px;"> x </td>
                                <td style="font-size: 24px;"> x </td>
                                <td>
                                    <form action="#" method="POST">
                                        @csrf
                                        <input value="" name="idProduit" style="display: none;" />
                                        <button type="submit" style="background-color: red;" class="btn btn-danger">
                                            supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>

                    <br>

                </div>
            </div>





        </div>
        <!--/.content-->
    </div>
    <!--/.span9-->
    </div>
    </div>
    <!--/.container-->
    </div>
    <!--/.wrapper-->

    <div class="footer">
        <div class="container">


            <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved.
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-2">
            <div class="row">
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="file">Choisir le csv</label>
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button type="submit" class="btn btn-primary">valider</button>
                </form>
            </div>
        </div>


        <form action="#">
            @csrf
            <button type="submit" class="btn btn-success">Export Excel</button>
        </form><br>

        <form action="#">
            @csrf
            <button type="submit" class="btn btn-danger">Export PDF</button>
        </form><br>

    </div>

    </div>

    <style>
        .w-5 {
            display: none;
        }
    </style>
@endsection
