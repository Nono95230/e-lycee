@section('sidebar')
    
	<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
	<div id="menu-sidebar" class="collapse navbar-collapse">
	    <ul class="nav navbar-nav side-nav">
	    	@if($user->isTeacher())
		        <li class="{{ Request::is('teacher/dashboard') ? 'active' : '' }}">
		            <a href="{{ route('dashboard') }}"><i class="fa fa-fw fa-2x fa-dashboard"></i>Tableau de Bord</a>
		        </li>
		        <li class="{{ Request::is('teacher/qcm') ? 'active' : '' }}" >
		            <a href="{{route ('qcm.index')}}"><i class="fa fa-fw fa-2x fa-file-text-o "></i> Qcm</a>
		        </li>
		        <li class="{{ Request::is('teacher/post') ? 'active' : '' }}" >
		            <a href="{{ route('post.index') }}"><i style="transform: rotate(45deg);" class="fa fa-fw fa-2x fa-thumb-tack"></i> Articles</a>
		        </li>
	        @elseif($user->isFinalClass() || $user->isFirstClass())
		        <li class="{{ Request::is('student/dashboard') ? 'active' : '' }}">
		            <a href="{{ route('student.dashboard') }}"><i class="fa fa-fw fa-2x fa-dashboard"></i>Tableau de Bord</a>
		        </li>
		        <li class="{{ Request::is('student/qcm') ? 'active' : '' }}" >
		            <a href="{{route ('student.qcm.index')}}"><i class="fa fa-fw fa-2x fa-file-text-o "></i> Qcm</a>
		        </li>
	    	@endif
	    </ul>
	</div>
@show