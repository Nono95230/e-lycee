@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	

    <!-- Index Entity Style -->
    <link href="{{ url('css/index-entity.css')}}" rel="stylesheet">
    <!-- BTN Publish Style-->
    <link href="{{ url('css/btn-publish.css')}}" rel="stylesheet">

@endsection

@section('content_top')

<div class="content_first">
	<!-- Title -->
	<div class="row">
		<div class="col-md-offset-2 col-md-8 text-center">
			<h1>{{ $title }}</h1>
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
			<li @if($perPage == 5) class="first active" @else class="first" @endif><a href="{{route('qcm.index')}}?perPage=5">5</a></li>
			<li @if($perPage == 10) class="active" @endif><a href="{{route('qcm.index')}}?perPage=10">10</a></li>
			<li @if($perPage == 15) class="active" @endif><a href="{{route('qcm.index')}}?perPage=15">15</a></li>
			<li @if($perPage == 20) class="active" @endif><a href="{{route('qcm.index')}}?perPage=20">20</a></li>
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
			<th>Niveau</th>
			<th>Nombre de questions</th>
			<th>Créé le</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>

		<?php $number=1; ?>
		@foreach ($qcms as $qcm)
			<tr>
				<td>{!! ( ( $qcms->currentPage() - 1 )*$qcms->perPage() )+ $number++ !!}</td>
				<td>{{ $qcm->title }}</td>
				<td>{{ ($qcm->class_level==='premiere')? 'Première' :'Terminale' }}</td>
				<td>{{ $qcm->questions->count() }}</td>
				<td>{{ $qcm->created_at }}</td>
				<td>
				@if($qcm->status === "published")
				    <div class="make-switch">
				    	<div class="bootstrap-switch-id-tete bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-on">
				    		<div class="bootstrap-switch-container">
					    		<span class="bootstrap-switch-handle-on bootstrap-switch-success"><i class="fa fa-fw fa-check"></i></span>
						    	<span class="bootstrap-switch-label">Publié</span>
						    	<span class="bootstrap-switch-handle-off bootstrap-switch-danger"><i class="fa fa-fw fa-times"></i></span>
						    	<form action="{{ route('qcm.status.update',['id'=>$qcm->id])}}" method="post">
									{{ csrf_field() }}
						    		<input name="status" checked="" type="checkbox">
						    		<input type="submit" style="display:none;">
						    	</form>
						    	
				    		</div>
				    	</div>
				    </div>
				@elseif($qcm->status === "unpublished")
				    <div class="make-switch">
				    	<div class="bootstrap-switch-id-tete bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-off">
				    		<div class="bootstrap-switch-container">
					    		<span class="bootstrap-switch-handle-on bootstrap-switch-success"><i class="fa fa-fw fa-check"></i></span>
						    	<span class="bootstrap-switch-label">Publié</span>
						    	<span class="bootstrap-switch-handle-off bootstrap-switch-danger"><i class="fa fa-fw fa-times"></i></span>
						    	<form action="{{ route('qcm.status.update',['id'=>$qcm->id])}}" method="post">
									{{ csrf_field() }}
						    		<input name="status" type="checkbox">
						    		<input type="submit" style="display:none;">
						    	</form>
						    	
				    		</div>
				    	</div>
				    </div>
				@endif
				    <a href="{{ route('qcm.edit',$qcm->id) }}" class="btn btn-info"><i class="fa fa-pencil fa-lg fa-fw"></i></a>

					<a href="#modal{{ $qcm->id }}" class="btn btn-danger" data-toggle="modal" data-target="#pop-in-delete-{{$qcm->id}}"><i class="fa fa-trash fa-lg fa-fw"></i></a>
					<!-- Modal Structure -->
					<div class="modal fade" id="pop-in-delete-{{$qcm->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{$qcm->id}}" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="modalLabel{{$qcm->id}}"><strong>Êtes-vous certains de vouloir supprimer ce QCM ?</strong></h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <p>Prenez garde, cette action est définitive, vous ne pourrez pas revenir en arrière !</p>
					      </div>
					      <div class="modal-footer">
							<form method="post" action="{{ route('qcm.destroy',$qcm) }}">
					    		{{ csrf_field() }} {{-- token pour protéger votre formulaire CSRF --}}
					    		{{ method_field('DELETE') }}
						        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Je m'y refuse</button>
						        <button type="submit" class="btn btn-success pull-rigth">Je le supprime</button>
							</form>
					      </div>
					    </div>
					  </div>
					</div>

				</td>
			</tr>

		@endforeach
	</tbody>
</table>
<div class="row">
	<div class="col-md-12 text-center">{!! $qcms->links() !!}</div>
</div>

@endsection


@section('javascript')

    <!-- Pagination script -->
    <script src="{{ url('js/index-pagination.js')}}"></script>
    <!-- BTN publish script -->
    <script src="{{ url('js/btn-publish.js')}}"></script>

@endsection