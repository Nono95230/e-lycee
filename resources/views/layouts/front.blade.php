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

    <link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    
    <!-- Custom Fonts -->
    <link href="{{ url('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <style>
        .addthis_inline_share_toolbox_d5yy{
            padding-top:19px;
            padding-right:40px;
        }
        .addthis_inline_share_toolbox{
            padding-top:16px;
            padding-left:40px;
        }
        #user-info a{
            padding-left:25px;
            padding-right:25px;
        }
        #user-info a i{
            padding-right:15px;
        }
        #user-info .dropdown-menu li a i{
            padding-right:40px;
        }
        #user-info .dropdown-menu li:nth-last-child(1) a i{
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
        #first-nav{
            z-index: 9999;
            margin:0;
            height:58px;
        }
        #second-nav{
            min-height: auto;
        }
        #second-nav li a{
            padding: 15px 20px;
        }
        #search-post{
            margin:0;
            padding-top: 10px;
        }
        @media screen and (max-width: 767px) {
            #first-nav #user-info ul{
                background-color: #fff;
                border: 1px solid rgba(0,0,0,.15);
                border-radius: 4px;
                box-shadow: 0 6px 12px rgba(0,0,0,.175);
                min-width: 160px;
                padding: 5px 0;
            }
            #first-nav #user-info ul li a{
                display: block;
                padding: 3px 20px;
                clear: both;
                font-weight: 400;
                line-height: 1.42857143;
                color: #333;
                white-space: nowrap;
            }
            #first-nav .container .navbar-collapse{
                margin:0;
            }
            #first-nav .container .navbar-collapse .navbar-nav{
                margin:0;
            }
            #first-nav #user-info a{
                padding-top: 14px;
                padding-bottom: 14px;
            }
        }
        @media screen and (max-width: 520px) {
            #first-nav{
                height:113px;
            }
            #first-nav .nav.navbar-nav.pull-left{
                float: none!important;
                display: inline-block;
                width: 49%;
            }
            #first-nav .nav.navbar-nav.pull-right{
                float: none!important;
                display: inline-block;
                width: 49%;
            }
            .addthis_inline_share_toolbox{
                float: right;
            }
            #first-nav ul.nav.navbar-nav.pull-right{
                float: none!important;
                display: block;
                margin:0 auto;
                width:230px;
            }
        }

    </style>

    @yield('stylesheet')
</head>


<body>
    @include('partials.front.header')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-md-8">

                @yield('content')

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                @include('partials.front.sidebar')
            </div>

        </div>
        <!-- /.row -->

        @include('partials.front.footer')

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{ url('jquery/jquery-3.2.1.min.js')}}" async></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('bootstrap/js/bootstrap.min.js')}}" async></script>

    <!-- Pour les deux boutons suivre -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-598072eef2fd2171" async></script>
    <!-- Pour le bouton j'aime -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-598072eef2fd2171" async></script>


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