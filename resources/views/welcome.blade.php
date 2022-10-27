<!DOCTYPE html>
<html lang="es">

    <meta charset="utf-8">
    <title>SII SalleTux</title>
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

    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        




        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
        @yield('contenidoprincipal')    

<div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>SII TICKETS</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Ingresa tu nombre de usuario y contraseña
            </div>
            <form method="POST" action="{{ route('login') }}">
                 @csrf
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="clearfix"></div>


                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <!--
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            -->
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

<!-- content ends -->
</div>
<!--/#content.col-md-0-->
</div><!--/fluid-row-->


    <footer class="row">
       

        <!-- <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Desarrollado por: <a
                href="#">Chiapanet Computo</a></p>  -->
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


</body>
</html>
