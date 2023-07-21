<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ParkingMoney@admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
    <!-- Chart Js -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="carreview.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b><i class="fa fa-cab"></i></b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b><i class="fa fa-cab"></i> Parking </b>Money</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>


                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('profil.jpg') }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">Rjr Ny-Aritoky Michael</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('profil.jpg') }}" class="img-circle" alt="User Image">

                                    <p>
                                        Rjr Ny-Aritoky Michaele
                                        <small>Member since Nov. 2021</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-center">
                                        <a class="btn btn-danger" style="width: 100%" href="{{ url('/') }}"><i
                                                class="fa fa-spinner fa-spin"></i> Log out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('profil.jpg') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Rjr Ny-Aritoky Michael</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> @admin </a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Navigation Forms</li>
                    <li>
                        <a href="{{ url('pageCar') }}">
                            <i class="fas fa-cab"></i> <span>Parking Review</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('car') }}">
                            <i class="fa fa-cab"></i> <span>Car Review</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('clientAff') }}">
                            <i class="fa fa-user"></i> <span>Client </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pageAdmin') }}">
                            <i class="fa fa-eye"></i> <span>Reservation Review</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('listMoney') }}">
                            <i class="fa fa-money"></i> <span>Payment</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('chartPage') }}">
                            <i class="fa fa-pie-chart"></i> <span>Chart</span>
                        </a>
                    </li>



                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        @yield('content')


        <footer class="main-footer">
            <div class="pull-right hidden-xs">
            </div>
            <strong>Copyright &copy; 2019-2022 <a href="https://adminlte.io">Parking Money</a>.</strong> All rights
            reserved.
        </footer>

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.j') }}s"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- page script -->
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>





    <SCRIPT LANGUAGE="JavaScript">
        /*
            Source :  http://www.editeurjavascript.com
             Adaptation : http://www.outils-web.com
            */
        function HeureCheckEJS() {
            date = new Date;
            heure = date.getHours();
            min = date.getMinutes();
            sec = date.getSeconds();
            jour = date.getDate();
            mois = date.getMonth() + 1;
            annee = date.getFullYear();
            if (sec < 10)
                sec0 = "0";
            else
                sec0 = "";
            if (min < 10)
                min0 = "0";
            else
                min0 = "";
            if (heure < 10)
                heure0 = "0";
            else
                heure0 = "";
            DinaHeure = heure0 + heure + ":" + min0 + min + ":" + sec0 + sec;
            which = DinaHeure
            if (document.getElementById) {
                document.getElementById("heure").innerHTML = which;
            }
            setTimeout("HeureCheckEJS()", 1000)
        }
        window.onload = HeureCheckEJS;
    </SCRIPT>
    <style>
        .yes {
            /* position: relative; */
            /* display: inline-block; */
            /* position: absolute; */
            /* border-bottom: 1px dotted black; */
        }

        .yes .yestext {
            visibility: hidden;
            width: 500px;
            background-color: white;
            color: black;
            text-align: center;
            border-radius: 6px;
            border: 1px solid black;
            padding: 1px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 0%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .yes .yestext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .yes:hover .yestext {
            visibility: visible;
            opacity: 1;
        }
    </style>


    <script type="text/javascript">
        $("#submit").click(function () {
          var name = $("#name").val();
          var marks = $("#marks").val();
          var str = "You Have Entered "
            + "Name: " + name
            + " and Marks: " + marks;
          $("#modal_body").html(str);
        });
      </script>

</body>

</html>
