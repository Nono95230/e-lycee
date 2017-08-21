@section('header')
    <header>
        
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('home')}}"><i class="fa fa-fw fa-2x fa-home"></i> Retour au site public</a>
            </div>
            <button id="button-target-menu-sidebar" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-sidebar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav pull-right">
                <li id="user-info" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-2x fa-user"></i> Bonjour {{ $user->username }}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{route('logout')}}"><i class="fa fa-fw fa-2x fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            @include('partials.back.sidebar')
            
        </nav>
    </header>
@show