<!DOCTYPE html>
<html lang="ES">

    <meta charset="utf-8">
    <title>SII ChiapaNet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">
    <link rel="stylesheet" href="{{ asset("bower_components/bootstrap/dist/css/bootstrap.min.css")}}" >
    <link id="bs-css" href="{{ asset("css/bootstrap-cybrog.min.css")}}" rel="stylesheet">

    <link href="{{ asset("css/charisma-app.css")}}" rel="stylesheet">
    <link href="{{ asset("bower_components/fullcalendar/dist/fullcalendar.css")}} " rel='stylesheet'>
    <link href="{{ asset("bower_components/fullcalendar/dist/fullcalendar.print.css")}} " rel='stylesheet' media='print'>
    <link href="{{ asset("bower_components/chosen/chosen.min.css")}} " rel='stylesheet'>
    <link href="{{ asset("bower_components/colorbox/example3/colorbox.css")}} " rel='stylesheet'>
    <link href="{{ asset("bower_components/responsive-tables/responsive-tables.css")}} " rel='stylesheet'>
    <link href="{{ asset("bower_components/bootstrap-tour/build/css/bootstrap-tour")}} "min.css' rel='stylesheet'>
    <link href="{{ asset("css/jquery.noty.css")}} " rel='stylesheet'>
    <link href="{{ asset("css/noty_theme_default.css")}} " rel='stylesheet'>
    <link href="{{ asset("css/elfinder.min.css")}} " rel='stylesheet'>
    <link href="{{ asset("css/elfinder.theme.css")}} " rel='stylesheet'>
    <link href="{{ asset("css/jquery.iphone.toggle.css")}} " rel='stylesheet'>
    <link href="{{ asset("css/uploadify.css")}} " rel='stylesheet'>
    <link href="{{ asset("css/animate.min.css")}} " rel='stylesheet'>

    <!-- jQuery -->
    <script src=" {{ asset("bower_components/jquery/jquery.min.js")}} "></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
         
            <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo" src=" {{ asset("img/logo.png " ) }} " class="hidden-xs"/>
                <span>SIISALLETUX</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    @guest

                        @else
                            <li class="nav-item dropdown">
                                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> {{ Auth::user()->name }}        
                            </li>
                        @endguest
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesion</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- user dropdown ends -->

          

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="/home"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                        <li><a class="ajax-link" href="/usuarios"><i class="glyphicon glyphicon-eye-open"></i><span> Usuarios</span></a>
                        </li>
                        <li><a class="ajax-link" href="/clientes"><i class="glyphicon glyphicon-edit"></i><span> Clientes</span></a></li>
                        <li><a class="ajax-link" href="/articulos"><i class="glyphicon glyphicon-edit"></i><span> Articulos</span></a></li>
                        <li><a class="ajax-link" href="/tickets"><i class="glyphicon glyphicon-list-alt"></i><span> Tickets</span></a>
                        </li>
                        <li><a class="ajax-link" href="#"><i class="glyphicon glyphicon-font"></i><span> Reportes</span></a>
                        </li>
                        <li><a class="ajax-link" href="#"><i class="glyphicon glyphicon-picture"></i><span> Hojas de servicio</span></a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->



        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
        @yield('contenidoprincipal')    
<!-- content ends -->
</div>
<!--/#content.col-md-0-->
</div><!--/fluid-row-->


    <footer class="row">
       

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                target="_blank" href="https://www.chiapanetcomputo.com">Chiapanet</a></p>
    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js")}} "></script>

<!-- library for cookie management -->
<script src=" {{ asset("js/jquery.cookie.js")}} "></script>
<!-- calender plugin -->
<script src=" {{ asset("bower_components/moment/min/moment.min.js")}} "></script>
<script src=" {{ asset("bower_components/fullcalendar/dist/fullcalendar.min.js")}} "></script>
<!-- data table plugin -->
<script src=" {{ asset("js/jquery.dataTables.min.js")}} "></script>

<!-- select or dropdown enhancer -->
<script src=" {{ asset("bower_components/chosen/chosen.jquery.min.js")}} "></script>
<!-- plugin for gallery image view -->
<script src=" {{ asset("bower_components/colorbox/jquery.colorbox-min.js")}} "></script>
<!-- notification plugin -->
<script src=" {{ asset("js/jquery.noty.js")}} "></script>
<!-- library for making tables responsive -->
<script src=" {{ asset("bower_components/responsive-tables/responsive-tables.js")}} "></script>
<!-- tour plugin -->
<script src=" {{ asset("bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js")}} "></script>
<!-- star rating plugin -->
<script src=" {{ asset("js/jquery.raty.min.js")}} "></script>
<!-- for iOS style toggle switch -->
<script src=" {{ asset("js/jquery.iphone.toggle.js")}} "></script>
<!-- autogrowing textarea plugin -->
<script src=" {{ asset("js/jquery.autogrow-textarea.js")}} "></script>
<!-- multiple file upload plugin -->
<script src=" {{ asset("js/jquery.uploadify-3.1.min.js")}} "></script>
<!-- history.js for cross-browser state change on ajax -->
<script src=" {{ asset("js/jquery.history.js")}} "></script>
<!-- application script for Charisma demo -->
<script src=" {{ asset("js/charisma.js")}} "></script>

@yield("scriptpersonal")
</body>
</html>
