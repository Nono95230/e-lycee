@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
    
	<!-- Student Dasboard STYLE  -->
    <link href="{{ url('css/student-dashboard.css')}}" rel="stylesheet">

@endsection

@section('content_top')

<div class="content_first">
    <!-- Title -->
    <div class="row">
        <div class="col-md-offset-2 col-md-8 text-center">
            <h1>{{ $title}}</h1>
        </div>
</div>

@endsection

@section('content')
    
    <div class="row">
        <!-- STATISTIQUES -->
        <div class="col-xs-12 col-md-12">
            <div id="statistiques" class="panel panel-info">
                <div class="panel-heading text-center">
                    <h3>Statistiques</h3>
                </div>
                <div class="panel-body">

                        <ul>
                            <li class="element-stat">
                                <i class="fa fa-bar-chart fa-fw fa-lg" aria-hidden="true"></i> 
                                <span>Votre score : {{ $totalScore }} points sur {{ $totalQuestion }}</span>
                            </li>
                            <li class="element-stat">
                                <i class="fa fa-file-text-o fa-fw fa-lg" aria-hidden="true"></i>
                                <span>{{ $totalQcm }} QCM réalisés</span>
                            </li>
                            @if($isNewQcm)
                            	<li class="element-stat text-danger">
	                                <i class="fa fa-times fa-fw fa-lg" aria-hidden="true"></i>
	                                <span class="">Pour être jour, vous devez compléter tous les Qcm restants...</span>
	                                <a href="{{route('student.qcm.index')}}">C'est parti</a>
                            	</li>
                            @else
                            	<li class="element-stat text-success">
	                                <i class="fa fa-check fa-fw fa-lg" aria-hidden="true"></i>
	                                <span class="">Tous les Qcm ont été complétés, vous êtes à jour !</span>
                            	</li>
                            @endif
                        </ul>
                    
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
@endsection