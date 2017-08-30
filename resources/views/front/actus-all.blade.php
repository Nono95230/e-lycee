@extends('layouts.front')

@section('title', $title)

@section('sidebar')
    @parent
@endsection

@section('stylesheet')
    <!-- CSS Actu -->
    <link href="{{ url('css/actu-all-blade.css')}}" rel="stylesheet">
@endsection

@section('content')
    <!-- Title -->
    <div class="page-title">
      <h1>{{ $title}}</h1>
    </div>
    

	@foreach($posts as $post)
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
        <p class="inline">Publié le {{ $post->published_at }} par {{ $post->user->username }}</p>
        <p class="pull-right inline"><i class="fa fa-comment" aria-hidden="true"></i> {{ $post->comments->count() }}</p>
      </div>
    </div>

	@endforeach
  <div class="post-pagination">{{ $posts->links()}}</div>
  
@endsection

@section('javascript')
@endsection