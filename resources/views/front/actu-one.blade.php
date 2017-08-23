@extends('layouts.front')

@section('title', $title)

@section('sidebar')
    @parent
@endsection

@section('stylesheet')
    <style>
    
    </style>
@endsection

@section('content')

    <!-- Title -->
    <h1>{{ $title}}</h1>
    
	<!-- Blog Post -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<img class="card-img-top" src="{{ App::make('url')->to('/').'/posts/images/'.$post->url_thumbnail }}" alt="Card image cap" style="width:100%;">
		</div>
		<div class="panel-body">
			<h2 class="panel-title">{{ $post->title }}</h2>
			<p class="panel-text">{{ $post->abstract }}</p>
			<a href="{{ route('actu',$post->id)}}" class="btn btn-primary pull-right">Lire la suite...</a>
		</div>
		<div class="panel-footer text-muted">
			Publié le {{ $post->published_at }} par {{ $post->user->username }}
		</div>
	</div>

@endsection

@section('javascript')

    <script type="text/javascript">


    </script>

@endsection