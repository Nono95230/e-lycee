@section('header')
    <header>
        <!-- Navigation -->
        <!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"> -->
        <nav id="first-nav" class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="nav navbar-nav pull-left">
                        <div class="addthis_inline_share_toolbox_d5yy"></div>
                    </div>
                    <div class="nav navbar-nav pull-right">
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                    <ul class="nav navbar-nav pull-right">
                        @if( !auth()->check()) 
                            <li id="user-info">
                                <a href="{{route('login')}}">
                                <i class="fa fa-fw fa-2x fa-user"></i> Connectez-vous</a>
                            </li>
                        @else
                            <li id="user-info" class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-2x fa-user"></i> Bonjour {{ $user->username }}<b class="caret"></b></a>
                                <ul class="dropdown-menu collapse">
                                    <li>
                                        <a href="{{ route('dashboard') }}"><i class="fa fa-fw fa-2x fa-dashboard"></i> Tableau de bord</a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}"><i class="fa fa-fw fa-2x fa-power-off"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <nav id="second-nav" class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li role="serach" class="pull-right navbar-right">
                        <form id="search-post" class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </li>
                    <li role="presentation" class="{{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li role="presentation" class="{{ Request::is('actualites') ? 'active' : '' }}">
                        <a href="{{route('actus')}}">Actus</a>
                    </li>
                    <li role="presentation" class="{{ Request::is('le-lycee') ? 'active' : '' }}">
                        <a href="{{route('le-lycee')}}">Le Lycée</a>
                    </li>
                </ul>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </header>

@show