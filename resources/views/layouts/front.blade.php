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
</head>

    @yield('stylesheet')

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