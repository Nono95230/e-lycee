@section('sidebar')
    
	<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
	<div id="menu-sidebar" class="collapse navbar-collapse">
	    <ul class="nav navbar-nav side-nav">
	        <li class="{{ Request::is('member/dashboard') ? 'active' : '' }}">
	            <a href="#"><i class="fa fa-fw fa-2x fa-dashboard"></i> Dashboard</a>
	        </li>
	        <li class="{{ Request::is('member/') ? 'active' : '' }}" >
	            <a href="#"><i style="transform: rotate(45deg);" class="fa fa-fw fa-2x fa-thumb-tack "></i> Fiches</a>
	        </li>
	        <li class="{{ Request::is('member/') ? 'active' : '' }}" >
	            <a href="{{ route('post.index') }}"><i style="transform: rotate(45deg);" class="fa fa-fw fa-2x fa-thumb-tack"></i> Articles</a>
	        </li>
	        <li class="{{ Request::is('member/') ? 'active' : '' }}" >
	            <a href="#"><i style="transform: rotate(45deg);" class="fa fa-fw fa-2x fa-thumb-tack"></i> Commentaires</a>
	        </li>
	        <li class="{{ Request::is('member/') ? 'active' : '' }}" >
	            <a href="#"><i class="fa fa-fw fa-2x fa-file-o"></i> Pages</a>
	        </li>
	        <li class="{{ Request::is('member/') ? 'active' : '' }}" >
	            <a href="#"><i class="fa fa-fw fa-2x fa-users"></i> Elèves</a>
	        </li>
	    </ul>
	</div>
@show