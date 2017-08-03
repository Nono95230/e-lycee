@section('header')
    <header>
        <!-- Navigation -->
        <!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"> -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="nav navbar-nav">
                        <div class="addthis_inline_share_toolbox_d5yy" style="padding-top:16px;"></div>
                    </div>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">A faire</a>
                        </li>
                        <li>
                            <a href="#">A faire</a>
                        </li>
                        <li>
                            <a href="{{route('login')}}">Connectez-vous</a>
                        </li>
                    </ul>
                    <div class="nav navbar-nav">
                        <div class="addthis_inline_share_toolbox" style="padding-top:13px;"></div>
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="{{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li role="presentation" class="{{ Request::is('actualites') ? 'active' : '' }}">
                        <a href="{{route('actus')}}">Actus</a>
                    </li>
                    <li role="presentation" class="{{ Request::is('le-lycee') ? 'active' : '' }}">
                        <a href="{{route('le-lycee')}}">Le Lycée</a>
                    </li>
                    <li role="serach" class=" navbar-right">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </header>

@show