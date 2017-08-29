<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Lycee - @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS For User Authentificate -->
    <link href="{{ url('css/dashboard/sb-admin.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- CSS Layout -->
    <link href="{{ url('css/layout-back.css')}}" rel="stylesheet" type="text/css">


    
    @yield('stylesheet')

</head>

<body>

    <div id="wrapper">
        
        @include('partials.back.header')

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-10  col-md-offset-1">
                        <div id="content_top">
                            @yield('content_top')
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10  col-md-offset-1">
                        <div id="content">
                            @yield('content')
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ url('jquery/jquery-3.2.1.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('bootstrap/js/bootstrap.min.js')}}"></script>

    <script type="text/javascript" async>
    
    //For Flash Message FadeOut
      setTimeout(function(){
        if ($('#flash-message').length === 1) {
          $('#flash-message').fadeOut(800);
        };
      },2200);

    </script>
    
    @yield('javascript')

</body>

</html>
