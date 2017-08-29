@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	
    <!-- Form Entity Style -->
    <link href="{{ url('css/form-entity.css')}}" rel="stylesheet">
    <!-- BTN Publish Style-->
    <link href="{{ url('css/btn-publish.css')}}" rel="stylesheet">

@endsection

@section('content_top')

<div class="content_first">
	<!-- Title -->
	<div class="row">
		<div class="col-md-10">
			<h1>{{ $title}}</h1>
		</div>
		<div class="col-md-2">
			<a id="btn-return" type="button" class="btn btn-success pull-right" href="{{route('post.index')}}"><i class="fa fa-angle-double-left fa-fw" aria-hidden="true"></i>
			 Retour à la liste</a>
		</div>
	</div>
</div>
<div class="content_second">
	@include('partials.flash-message')
</div>

@endsection

@section('content')

    <form method="POST" action="{{ route('post.update', $post) }}" enctype="multipart/form-data">
    	{{ csrf_field() }}
		{{ method_field('PUT') }}
		<input type="hidden" name="post_id" value="{{$post->id}}">
		<div class="row">
			<div class="col-lg-10 col-md-9 col-sm-8 col-xs-7">

				{!! Form::inputMacro('text','title','post', $errors? $errors : null ,old('title'),$post->title) !!}
			
			</div>
			<div class="col-lg-2 col-md-3  col-sm-4 col-xs-5">

				{!! Form::publishMacro('checkbox', 'status', 'post', old('status'), $post->status) !!}

			</div>
		</div>
		<div class="row">
			<div class="col-md-6">

				{!! Form::textAreaMacro('abstract','post', $errors? $errors : null ,old('abstract'),$post->abstract) !!}

			</div>

			<div class="col-md-6">
				{!! Form::fileMacro( 'url_thumbnail', 'post', $errors? $errors : null, $post->url_thumbnail ) !!}
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">

				{!! Form::textAreaMacro('content','post', $errors? $errors : null ,old('content'),$post->content) !!}

			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				{!! Form::submitMacro('edit','post') !!}
			</div>
		</div>

    </form>

@endsection

@section('javascript')

    <!-- BTN publish script -->
    <script src="{{ url('js/btn-publish.js')}}"></script>

@endsection