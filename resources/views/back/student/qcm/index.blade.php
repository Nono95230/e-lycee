@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	<!-- Pagination Student Style-->
    <link href="{{ url('css/student-index.css')}}" rel="stylesheet">

@endsection

@section('content_top')

<div class="content_first">
	<!-- Title -->
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<h1>{{ $title }} - Niveau {{ ($userRole === 'premiere')? 'Première':'Terminale' }}</h1>
		</div>
		<div class="col-md-offset-2col-md-2">
			<a id="btn-add" type="button" class="btn btn-success pull-right" href="{{route('student.dashboard')}}"><i class="fa fa-dashboard fa-fw" aria-hidden="true"></i> Retour au Dashboard</a>
		</div>
	</div>
</div>
<div class="content_second">
	@include('partials.flash-message')
</div>

@endsection


@section('content')

<div class="row">
	<div class="col-md-4">
		<ul id="perpage" class="pagination">
			<div class="bg-primary per_page_title"><span>QCM par page</span></div>
			<li @if($perPage == 5) class="first active" @else class="first" @endif><a href="{{route('student.qcm.index')}}?perPage=5">5</a></li>
			<li @if($perPage == 10) class="active" @endif><a href="{{route('student.qcm.index')}}?perPage=10">10</a></li>
			<li @if($perPage == 15) class="active" @endif><a href="{{route('student.qcm.index')}}?perPage=15">15</a></li>
			<li @if($perPage == 20) class="active" @endif><a href="{{route('student.qcm.index')}}?perPage=20">20</a></li>
		</ul>
	</div>
	<div class="col-md-4 text-center">{!! $qcms->links() !!}</div>
	<div class="col-md-4">
		<ul id="total" class="pagination pull-right">
			<div class="bg-primary total"><span>TOTAL : {!! $qcms->total() !!}</span></div>
		</ul>
	</div>
</div>

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>N°</th>
			<th>Titre</th>
			<th>En ligne depuis le</th>
			<th>Nombre de questions</th>
			<th>Votre score</th>
			<th>État</th>
		</tr>
	</thead>
	<tbody>

		<?php $number=1; ?>
		@foreach ($qcms as $key => $qcm)
			<tr>
				<td>{!! ( ( $qcms->currentPage() - 1 )*$qcms->perPage() )+ $number++ !!}</td>
				@if( $qcm->scores->where('user_id',$userId)->count() > 0 )
					<td>{{ $qcm->title }}</td>
				@else
					<td><a href="{{ route('student.qcm.respond', $qcm ) }}">{{ $qcm->title }}</a></td>
				@endif
				<td>{{ $qcm->created_at }}</td>
				<td>{{ $qcm->questions->count() }}</td>
				@if($qcm->scores->where('user_id',$userId)->count() > 0)
					<td>{{ $qcm->scores->where('user_id',$userId)->unique()[0]->note  }}</td>
					<td>
						<span class="element-status green" title="Fait"></span>
					</td>
				@else
					<td>
						<a href="{{ route('student.qcm.respond', $qcm ) }}">Débloquer</a>
					</td>
					<td>
						<span class="element-status red" title="Pas fait"></span>
					</td>
				@endif
			</tr>

		@endforeach
	</tbody>
</table>
<div class="row">
	<div class="col-md-12 text-center">{!! $qcms->links() !!}</div>
</div>

@endsection


@section('javascript')
@endsection