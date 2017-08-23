@extends('layouts.front')

@section('title', $title)

@section('sidebar')
    @parent
@endsection

@section('stylesheet')
    <style>
        .comment_heading i,
        .comment_heading h3{
            display:inline-block;
            vertical-align: top;
            margin-top:0;
        }
        #comments hr{
            margin-top: 5px;
            margin-bottom: 15px;
            border-top: 1px solid black;
        }
        .post-title{
            margin-bottom:0px;
        }
        .post-image{
            width:100%;
        }
        #post_content p{
            padding:10px;
        }
    </style>
@endsection

@section('content')

    <!-- Title -->
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
    @if( !$comments->isEmpty() )
	<div id="comments" class="well">
        @foreach($comments as $comment)
            <div class="comment">
                <div class="comment_heading">
                    <i class="fa fa-comment fa-fw fa-lg" aria-hidden="true"></i> <h3>{{$comment->user->username}}<small>, le {{$comment->created_at}}</small></h3>
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

    <script type="text/javascript">


    </script>

@endsection