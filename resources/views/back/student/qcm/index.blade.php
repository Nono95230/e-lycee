@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	
	<style>
		/*
		 * CSS TABLEAU
		 */
		table,th{
		  text-align:center;
		}
		table thead tr th:first-child,
		table tbody tr td:first-child,
		table thead tr th:nth-child(2),
		table tbody tr td:nth-child(2){
		  text-align:left;
		}
		table thead tr th:last-child,
		table tbody tr td:last-child{
		  text-align:right;
		}

        .element-status{
            display:inline-block;
            width:15px;
            height:15px;
            cursor:pointer;
        }
        .green{
            background-color:green;
        }
        .red{
            background-color:red;
        }


		/*
		 * CSS REGION - CONTENT_TOP
		 */
		#btn-add,
		#btn-return{
			margin-top:22px;
		}
		.content_second{
			min-height:80px;
		}
		#flash-message{
			margin-bottom:10px;
		}
		#perpage{
			padding-left:8px;
		}
		#total{
			padding-right:8px;
		}
		.pagination .per_page_title,
		.pagination .total{
			padding:6px 12px;
			text-align: center;
			border-top-left-radius:4px;
			border-top-right-radius:4px;
		}
		.pagination .total{
			border-bottom-left-radius:4px;
			border-bottom-right-radius:4px;
		}
		.pagination#perpage li a{
		  	margin-left:0;
		}
		.pagination#perpage li.first a{
			border-top-left-radius:0px;
			border-bottom-left-radius:4px;
		}
		.pagination#perpage li:last-child a{
			border-top-right-radius:0px;
		}

	</style>

@endsection

@section('content_top')

<div class="content_first">
	<!-- Title -->
	<div class="row">
		<div class="col-md-offset-2 col-md-8 text-center">
			<h1>{{ $title }} - Niveau {{ ($userRole === 'premiere')? 'Première':'Terminale' }}</h1>
		</div>
		<div class="col-md-2">
			<a id="btn-add" type="button" class="btn btn-success pull-right" href="{{route('qcm.create')}}"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Ajouter un QCM</a>
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
			<th>Nombre de questions</th>
			<th>Votre score</th>
			<th>État</th>
		</tr>
	</thead>
	<tbody>

		<?php $number=1; ?>
		@foreach ($qcms as $qcm)
			<tr>
				<td>{!! ( ( $qcms->currentPage() - 1 )*$qcms->perPage() )+ $number++ !!}</td>
				@if( $qcm->scores->where('user_id',$userId)->count() > 0 )
					<td>{{ $qcm->title }}</td>
				@else
					<td><a href="{{ route('student.qcm.respond', $qcm ) }}">{{ $qcm->title }}</a></td>
				@endif
				<td>{{ $qcm->questions->count() }}</td>
				@if($qcm->scores->where('user_id',$userId)->count() > 0)
					<td>{{ $qcm->scores->where('user_id',$userId)[0]->note }}</td>
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

    <script type="text/javascript">
		
    </script>

@endsection