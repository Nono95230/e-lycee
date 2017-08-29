@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	  <!--  Form Entity Other Style -->
    <link href="{{ url('css/form-entity-other.css')}}" rel="stylesheet">

@endsection

@section('content_top')

<div class="content_first">
	<!-- Title -->
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $title}}</h1>
			<h3>Titre du QCM : <small>{{$qcm_title}}</small></h3>
		</div>
		<div class="col-md-4">
			<a id="btn-return" type="button" class="btn btn-success pull-right" href="{{route('qcm.index')}}"><i class="fa fa-angle-double-left fa-fw" aria-hidden="true"></i>
			 Retour à la liste</a>
		</div>
	</div>
</div>
<div class="content_second">
	<div class="row">
		<div class="col-md-12">
            <div class="form-group">
                <a class="btn btn-primary pull-left" type="button" data-toggle="modal" data-target="#addQuestion"><i class="fa fa-plus fa-fw"></i> Rajouter une nouvelle question</a>
				<div class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h4 class="modal-title" id="modalLabel"><strong>Êtes-vous sûr de vouloir ajouter une question supplémentaire ?</strong></h4>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <p>Prenez garde, en effectuant cette action, les données saisies de cette page ne seront pas conservées !</p>
				      </div>
				      <div class="modal-footer">
                		<a class="btn btn-primary pull-left" type="button" href="{{route('question.add.new')}}"><i class="fa fa-plus fa-fw"></i> Ajouter quand même</a>
                		<a class="btn btn-danger pull-right" type="button" data-dismiss="modal">Ne pas ajouter</a>
                		<div class="note-action">
                			<p>Notes : </p>
                			<p><small>Pour un qcm, le maximum de question possible est de 30.</br>Si vous tentez d'en ajouter une au delà, cela n'aura aucun effet mis à part effacer les données saisies sur cette page !</small></p>
                		</div>
				      </div>
				    </div>
				  </div>
				</div>
                <a class="btn btn-danger pull-right" type="button" data-toggle="modal" data-target="#removeQuestion"><i class="fa fa-trash-o fa-fw"></i> Supprimer la dernière question</a>
				<div class="modal fade" id="removeQuestion" tabindex="-1" role="dialog" aria-labelledby="modalLabel2" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h4 class="modal-title" id="modalLabel2"><strong>Êtes-vous sûr de vouloir supprimer la dernière question ?</strong></h4>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <p>Prenez garde, en effectuant cette action, les données saisies de cette page ne seront pas conservées !</p>
				      </div>
				      <div class="modal-footer">
                		<a class="btn btn-danger pull-left" type="button" href="{{route('question.remove.last')}}"><i class="fa fa-trash-o fa-fw"></i> Supprimer quand même</a>
                		<a class="btn btn-primary pull-right" type="button" data-dismiss="modal">Ne pas supprimer</a>
                		<div class="note-action">
                			<p>Notes : </p>
                			<p><small>Pour un qcm, le minimum de question possible est de 5. Si vous tentez d'en supprimer une au delà, cela n'aura aucun effet mis à part effacer les données saisies sur cette page !</small></p>
                		</div>
				      </div>
				    </div>
				  </div>
				</div>
      </div>
		</div>
	</div>
</div>

@endsection

@section('content')
    <form method="POST" action="{{ route('question.store') }}">
    	{{ csrf_field() }}
		<legend><strong>Les questions : </strong></legend>
		@for($i = 0;$i < $nb_question; $i++)
			<div class="row">
				<div class="col-xs-12 col-md-8 col-lg-9">
					{!! Form::questionMacro(
						($i+1),
						'content',
						'question',
						$errors? $errors : null,
						old('content'.($i+1))
						) 
					!!}
				</div>
				<div class="col-xs-12 col-md-4 col-lg-3">
					{!! Form::radioMacro(
						($i+1),
						'answer',
						'question',
						['yes','no'],
						$errors? $errors : null
						,old('answer'.($i+1))
						) 
					!!}
				</div>
			</div>
		@endfor
		<div class="row">
			<div class="col-md-12 text-center">
				{!! Form::submitMacro('create','question') !!}
			</div>
		</div>

    </form>

@endsection

@section('javascript')


@endsection