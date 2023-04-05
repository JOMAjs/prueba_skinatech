<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <style>

        .chosen-container{
            width: 90% !important;
        }
        
        .chosen-single{
            height: 38px !important;
            padding: 8px 12px !important;
        }

        .has-error .chosen-single {
            border-color: #dc3545;
        }
    </style>


    <title>System</title>

<!-- Tell the browser to be responsive to screen width {{asset('template/vendor/fontawesome-free/css/all.min.css')}}-->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">

<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">

<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.css') }}">

<!-- AdminLTE Skins -->
<link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">

 <!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">

<!-- Morris chart -->
<link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css') }}">

<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('bower_components/chosen/chosen.min.css') }}">

<link href="{{asset('plugins/toast/src/jquery.toast.css')}}" rel="stylesheet">

<!--=====================================
PLUGINS DE JAVASCRIPT
======================================-->



<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('bower_components/chosen/chosen.jquery.min.js') }}"></script>
<script src="{{asset('plugins/toast/src/jquery.toast.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- DataTables -->
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- SweetAlert 2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

 <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- iCheck 1.0.1 -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

<!-- InputMask -->
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

<!-- jQuery Number -->
<script src="{{ asset('plugins/jqueryNumber/jquerynumber.min.js') }}"></script>

<!-- jQuery Validator -->
<script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>



<!-- daterangepicker http://www.daterangepicker.com/-->
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
<script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>

<!-- ChartJS http://www.chartjs.org/-->
<script src="{{ asset('bower_components/Chart.js/Chart.js') }}"></script>

</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
    <div class="wrapper">
    @guest
        <header class="main-header">
            <a href="inicio" class="logo"  style="background-color: #4DB6AC;">
                <span class="logo-mini"  >
                    <img src="" class="img-responsive" style="padding:10px">
                </span>
                <span class="logo-lg"  >
                    <img src="" class="img-responsive" style="padding:10px 0px">
                </span>
            </a>
       
        
            <nav class="navbar navbar-static-top" role="navigation" style="background-color: #4DB6AC;">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="background-color: #4DB6AC;" >
                    <span class="sr-only">Toggle navigation</span>
                </a>

            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="active">
                        <a href="/login">
                            <i class="fa fa-sign-out" ></i>
                            <span>Entrear login</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
    
    @else 
        <header class="main-header">
            <a href="/" class="logo"  style="background-color: #4DB6AC;">
                <span class="logo-mini"  >
                {{ Auth::user()->name }}
                </span>
                <span class="logo-lg"  >
                    <img src="" class="img-responsive" style="padding:10px 0px">{{ Auth::user()->name }}
                </span>
            </a>
       
        
            <nav class="navbar navbar-static-top" role="navigation" style="background-color: #4DB6AC;">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="background-color: #4DB6AC;" >
                    <span class="sr-only">Toggle navigation</span>
                </a>
                
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="active">
                        <a href="/">
                            <i class="fa fa-home"></i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="/usuarios">
                            <i class="fa fa-users"></i>
                            <span>Usuarios</span>
                        </a>
                        
                    </li>
                    
                    <li>
                        <a href="/productos">
                            <i class="fa fa-check-circle-o"></i>
                            <span>Productos</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-ul"></i>
                            <span>Catalogos</span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="/categorias">
                                    <i class="fa fa-circle-o"></i>
                                    <span>Categorias </span>
                                </a>
                            </li>

                            <li>
                                <a href="subcategorias">
                                    <i class="fa fa-circle-o"></i>
                                    <span>Sub Categorias </span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    
                    <li>
                        <a hhref="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">

                            <i class="fa fa-sign-out"></i>
                            <span>Cerrar seion</span>
                        </a>
                        
                    </li>
                    
                </ul>
            </section>
        </aside>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
        </form>

        @endguest
        <div id="content">
            @yield('contenido')
        </div>
        
    </div>

    <script src="{{asset('js/datatables.js') }}"></script>

    @yield('modals')


    @yield('scripts')

</body>
</html>