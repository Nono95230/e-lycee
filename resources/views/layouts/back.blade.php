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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



    <style>
        ul.nav.top-nav{
            padding:0;
            margin:0;
        }
        #user-info a{
            padding-left:25px;
            padding-right:25px;
        }
        #user-info a i{
            padding-right:15px;
        }
        #user-info .dropdown-menu a i{
            padding-right:60px;
        }
        #user-info .dropdown-menu{
            width: 100%;
        }
        #user-info a b.caret{
            margin-left: 10px;
            border-top: 7px solid #9d9d9d;
            border-right: 7px solid transparent;
            border-left: 7px solid transparent;
        }
        @media screen and (min-width: 768px) {

            body{
                margin-top: 75px;
            }
            #wrapper{
                padding-left: 250px;
            }

            #menu-sidebar ul{
                top: 75px;
                left: 250px;
                width: 250px;
                margin-left: -250px;

            }
            #menu-sidebar ul li a{
                width: 250px;
                font-size:16px;
            }
            #menu-sidebar ul li a i{
                font-size:28px;
                margin-right: 8px;
            }
            /* nav .navbar-header{
                margin-left: 225px;
            } */
            nav{
                height:75px;
            }
            nav .navbar-header a.navbar-brand {
                height:75px;
                padding-top:20px;
                padding-left:10px;
            }
            nav ul.top-nav a.dropdown-toggle{
                height:75px;
                padding-top:23px;
            }

        }
        @media screen and (max-width: 767px) {

            body{
                margin-top: 150px;
            }
            #wrapper{
                padding-left: 0px;
            }

            #button-target-menu-sidebar{
                margin-top: 20px;
                margin-left: 15px;
                margin-right: 0;
                float: left;
            }

            #button-target-menu-sidebar .icon-bar+.icon-bar{
                margin-top: 5px;
            }

            #menu-sidebar ul{
                top: 75px;

            }
            nav{
                height:150px;
            }
            nav .navbar-header a.navbar-brand {
                height:75px;
                padding-top:20px;
            }
            nav ul.top-nav a.dropdown-toggle{
                height:75px;
                padding-top:23px;
            }
            nav .navbar-header{
                display: block;
                width: 100%;
            }
            nav .navbar-header .navbar-brand{
                width: 246px;
                margin:0 auto;
                display: block;
                float: none;
            }
            #menu-sidebar{
                margin-top: 75px;
                background-color: #222;
            }
            #menu-sidebar .navbar-nav{
                margin: 0 -15px;
            }
            ul.nav.top-nav #user-info a{
                padding-left:20px;
                padding-right:20px;
            }

        }

    </style>
    
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

      setTimeout(function(){
        if ($('#flash-message').length === 1) {
          $('#flash-message').fadeOut(800);
        };
      },2200);



    </script>
    
    @yield('javascript')

</body>

</html>
