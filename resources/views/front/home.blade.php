@extends('layouts.front')

@section('title', $title)

@section('sidebar')
    @parent
@endsection

@section('stylesheet')
    <style>
    
      .panel-heading{
        padding:0;
      }
      .panel-heading img{
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
      }
      .inline{
        display: inline-block;
      }
      .panel-footer p{
        margin: 0;
      }
      .panel-title{
        margin-bottom:10px;
        font-size:30px;
      }
      .comment_nb{
      	margin:10px 0 0;
      	text-align:right;
      }
    </style>
@endsection

@section('content')
    <!-- Title -->
	@include('partials.flash-message')

    <div class="page-title">
      <h1>{{ $title}}</h1>
    </div>
	<div class="row">
		<div class="col-md-12">
		    <div class="panel panel-default">
		      <div class="panel-heading">
		        <img class="card-img-top" src="{{ App::make('url')->to('/').'/posts/images/'.$posts[0]->url_thumbnail }}" alt="Card image cap" style="width:100%;">
		      </div>
		      <div class="panel-body">
		        <h2 class="panel-title">{{ $posts[0]->title }}</h2>
		        <p class="panel-text">{{ $posts[0]->abstract }}</p>
		        <a href="{{ route('actu',$posts[0]->id)}}" class="btn btn-primary pull-right">Lire la suite...</a>
		      </div>
		      <div class="panel-footer text-muted">
		        <p class="inline">Publié le {{ $posts[0]->published_at }} par {{ $posts[0]->username }}</p>
		        <p class="pull-right inline"><i class="fa fa-comment" aria-hidden="true"></i> {{ $posts[0]->nb_comms }}</p>
		      </div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		    <div class="panel panel-default">
		      <div class="panel-heading">
		        <img class="card-img-top" src="{{ App::make('url')->to('/').'/posts/images/'.$posts[1]->url_thumbnail }}" alt="Card image cap" style="width:100%;">
		      </div>
		      <div class="panel-body">
		        <h2 class="panel-title">{{ $posts[1]->title }}</h2>
		        <p class="panel-text">{{ $posts[1]->abstract }}</p>
		        <div class="pull-right">
			        <a href="{{ route('actu',$posts[1]->id)}}" class="btn btn-primary">Lire la suite...</a>
			        <p class="comment_nb"><i class="fa fa-comment" aria-hidden="true"></i> {{ $posts[1]->nb_comms }}</p>
		        </div>
		      </div>
		      <div class="panel-footer text-muted">
		        <p class="inline">Publié le {{ $posts[1]->published_at }} par {{ $posts[1]->username }}</p>
		      </div>
		    </div>
		</div>
		<div class="col-md-6">
		    <div class="panel panel-default">
		      <div class="panel-heading">
		        <img class="card-img-top" src="{{ App::make('url')->to('/').'/posts/images/'.$posts[2]->url_thumbnail }}" alt="Card image cap" style="width:100%;">
		      </div>
		      <div class="panel-body">
		        <h2 class="panel-title">{{ $posts[2]->title }}</h2>
		        <p class="panel-text">{{ $posts[2]->abstract }}</p>
		        <div class="pull-right">
			        <a href="{{ route('actu',$posts[2]->id)}}" class="btn btn-primary">Lire la suite...</a>
			        <p class="comment_nb"><i class="fa fa-comment" aria-hidden="true"></i> {{ $posts[2]->nb_comms }}</p>
		        </div>
		      </div>
		      <div class="panel-footer text-muted">
		        <p class="inline">Publié le {{ $posts[2]->published_at }} par {{ $posts[2]->username }}</p>
		      </div>
		    </div>
		</div>
	</div>

@endsection
