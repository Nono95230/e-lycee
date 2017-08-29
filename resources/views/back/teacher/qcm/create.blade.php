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
		</div>
		<div class="col-md-4">
			<a id="btn-return" type="button" class="btn btn-success pull-right" href="{{route('qcm.index')}}"><i class="fa fa-angle-double-left fa-fw" aria-hidden="true"></i>
			 Retour à la liste</a>
		</div>
	</div>
</div>
<div class="content_second">
	@include('partials.flash-message')
</div>

@endsection

@section('content')

    <form method="POST" action="{{ route('qcm.store') }}">
    	{{ csrf_field() }}
		<legend><strong>Le qcm : </strong></legend>
		<div class="row">
			<div class="col-lg-10 col-md-9 col-sm-8 col-xs-7">

				{!! Form::inputMacro(
						'text',
						'title',
						'qcm', 
						$errors? $errors : null,
						old('title')
					)
				!!}
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-5">

				{!! Form::publishMacro(
					'checkbox',
					'status',
					'qcm',
					old('status')
					) 
				!!}
				
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4">
				{!! Form::radioMacro(
					0,
					'class_level',
					'qcm',
					['premiere','terminale'],
					$errors? $errors : null
					,old('class_level')
					) 
				!!}
			</div>
			<div class="col-xs-4">
				{!! Form::inputMacro(
					'number',
					'nb_question',
					'qcm',
					$errors? $errors : null ,
					old('nb_question')
					) 
				!!}
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				{!! Form::submitMacro('add','qcm') !!}
			</div>
		</div>

    </form>

@endsection

@section('javascript')

     <!-- BTN publish script -->
    <script src="{{ url('js/btn-publish.js')}}"></script>

@endsection