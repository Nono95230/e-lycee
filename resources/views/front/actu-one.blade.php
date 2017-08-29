@extends('layouts.front')

@section('title', $title)

@section('sidebar')
    @parent
@endsection

@section('stylesheet')

    <!-- CSS Actu One Blade -->
    <link href="{{ url('css/actu-one-blade.css')}}" rel="stylesheet">
@endsection

@section('content')

    @include('partials.flash-message')
    
    <div class="page-title">
      <h1>{{ $title}}</h1>
    </div>
    <div id="post">
        <div id="post_heading">
            <h2 class="post-title">{{ $postTitle }}</h2>
            <p><i class="fa fa-clock-o fa-lg fa-fw" aria-hidden="true"></i> Publié le {{ $postPublished }} par {{ $postUser }}</p>
        </div>
        <div id="post_content">
            <img class="post-image" src="{{ App::make('url')->to('/').'/posts/images/'.$postImage }}" alt="Image de l'article">
            <p>{{ $postContent }}</p>
        </div>
    </div>
    <div id="addComment" class="row text-center">
        <div class="col-md-12">
            <a class="btn btn-success btn-add-comment" onClick="fadeComment()" type="button">Laisser un commentaire</a>
            <form id="formAddComment" class="well text-left" action="{{ route('add.comment', $postId) }}" method="POST">
                {{ csrf_field() }}
                <h3>Laisser un commentaire</h3>
                <div class="row">
                    <div class="col-xs-12">

                        {!! Form::inputMacro('text','title','comment', $errors? $errors : null ,old('title')) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        {!! Form::textAreaMacro('content','comment', $errors? $errors : null ,old('content')) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        {!! Form::submitMacro('add','comment') !!}
                    </div>
                </div>

            </form>
        </div>
    </div>
    @if( !$comments->isEmpty() )
    <h3>Les commentaires actuels : </h3>
	<div id="comments" class="well">
        @foreach($comments as $comment)
            <div class="comment">
                <div class="comment_heading">
                    <i class="fa fa-comment fa-fw fa-lg" aria-hidden="true"></i> <h3><small>Le {{$comment->created_at}}</small></h3>
                </div>
                <p class="Com_info2">{{$comment->content}}</p>
            </div> 
            @if($comments->last() !== $comment)
                <hr>
            @endif
        @endforeach        
	</div>
    @endif
@endsection

@section('javascript')

    <!-- Page JavaScript -->
    <script src="{{ url('js/actu-one.js')}}"></script>

@endsection