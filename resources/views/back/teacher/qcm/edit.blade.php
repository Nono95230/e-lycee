@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	
    <!-- Form Entity Style -->
    <link href="{{ url('css/index-entity.css')}}" rel="stylesheet">
    <!-- BTN Publish Style-->
    <link href="{{ url('css/btn-publish.css')}}" rel="stylesheet">

@endsection

@section('content_top')

<div class="content_first">
	<!-- Title -->
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $title}}</h1>
			<h3>Titre du QCM : <small>{{$qcm->title}}</small></h3>
		</div>
		<div class="col-md-4">
			<a id="btn-return" type="button" class="btn btn-success pull-right" href="{{route('qcm.index')}}"><i class="fa fa-angle-double-left fa-fw" aria-hidden="true"></i>
			 Retour à la liste</a>
		</div>
	</div>
</div>
<div class="content_second">

</div>

@endsection

@section('content')

    <form method="POST" action="{{ route('qcm.update', $qcm) }}">
    	{{ csrf_field() }}
    	{{ method_field('PUT') }}
		<legend><strong>Le qcm : </strong></legend>
		<div class="row">
			<div class="col-xs-12 col-md-4 col-lg-6">

				{!! Form::inputMacro(
					'text',
					'title',
					'qcm',
					$errors? $errors : null ,
					old('title'),
					$qcm->title
					)
				!!}
			</div>
			<div class="col-xs-6 col-md-4 col-lg-3">
				{!! Form::publishMacro(
					'checkbox',
					'status',
					'qcm',
					old('status'),
					$qcm->status
					)
				!!}
			</div>
			<div class="col-xs-6 col-md-4 col-lg-3">
				{!! Form::radioMacro(
					0,
					'class_level',
					'qcm',
					['premiere','terminale'],
					$errors? $errors : null
					,old('class_level'),
					$qcm->class_level
					) 
				!!}
			</div>
		</div>
		<legend><strong>Les questions : </strong></legend>
		@for($i = 0;$i < count($question); $i++)
			<div class="row">
				<div class="col-xs-12 col-md-8 col-lg-9">
					{!! Form::questionMacro(
						($i+1),
						'content',
						'question',
						$errors? $errors : null,
						old('content'.($i+1)),
						$question[$i]->content
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
						,old('answer'.($i+1)),
						$question[$i]->answer
						) 
					!!}
				</div>
			</div>
		@endfor
		<div class="row">
			<div class="col-md-12 text-center">
				{!! Form::submitMacro('edit','qcm') !!}
			</div>
		</div>

    </form>

@endsection

@section('javascript')

    <!-- BTN publish script -->
    <script src="{{ url('js/btn-publish.js')}}"></script>


@endsection