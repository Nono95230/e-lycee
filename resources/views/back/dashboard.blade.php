@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	
	<style>
		/*
		 * CSS FOR EACH ELEMENT
		 */
		.element-title{
            display:inline-block;
			width:calc(100% - 20px);
		}
		#manage-posts ul{
            list-style-type:none;
            padding-left:20px;
		}
		.element-status{
            display:inline-block;
			width:15px;
            height:15px;
		}
		.green{
            background-color:green;
		}
		.red{
            background-color:red;
		}

        .element-stat i,
        .element-stat span{
            margin:0 0 15px;
            display:inline-block;
            vertical-align:top;
        }


	</style>

@endsection

@section('content_top')

<div class="content_first">
	<!-- Title -->
	<div class="row">
		<div class="col-md-offset-2 col-md-8 text-center">
			<h1>{{ $title }}</h1>
		</div>
	</div>
</div>


@endsection


@section('content')

    <div class="row">
        <!-- GESTION DES ARTICLES -->
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div id="manage-posts" class="panel panel-info">
                <div class="panel-heading">Gestion des articles</div>
                <div class="panel-body">
                    <h4>Les Articles les plus récents </h4>
                    @foreach ($postsRecent as $post)
                        <ul>
                            <li>
                                <span class="element-title">{{ $post->title }}</span>
                                <span class="element-status {{ ($post->status === "published")? 'green':'red'}}"></span>
                            </li>
                        </ul>
                    @endforeach
                    <a href="{{route ('post.index')}}">Voir tous les Articles </a>
                </div>
            </div>
        </div>

        <!-- GESTION DES QCM -->
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div id="manage-posts" class="panel panel-info">
                <div class="panel-heading">Gestion des QCM</div>
                <div class="panel-body">
                    <h4>Les QCM les plus récents </h4>
                    @foreach ($qcmsRecent as $qcm)
                        <ul>
                            <li>
                                <span class="element-title">{{ $qcm->title }}</span>
                                <span class="element-status {{ ($qcm->status === "published")? 'green':'red'}}"></span>
                            </li>
                        </ul>
                    @endforeach
                    <a href="{{route ('qcm.index')}}">Voir tous les QCM </a>
                </div>
            </div>
        </div>
        <!-- STATISTIQUES -->
        <div class="col-xs-12 col-md-12 col-lg-4">
            <div id="manage-posts" class="panel panel-info">
                <div class="panel-heading">Statistiques</div>
                <div class="panel-body">

                        <ul>
                            <li class="element-stat">
                                <i class="fa fa-comment fa-fw fa-lg" aria-hidden="true"></i> 
                                <span>{{ $statComments }} Commentaires</span>
                            </li>
                            <li class="element-stat">
                                <i class="fa fa-file-text-o fa-fw fa-lg" aria-hidden="true"></i>
                                <span>{{ $statQcms }} fiches QCM publiés </span>
                            </li>
                            <li class="element-stat">
                                <i class="fa fa-users fa-fw fa-lg" aria-hidden="true"></i>
                                <span>{{ $statEleves }} élèves</span>
                            </li>
                        </ul>
                    
                </div>
            </div>
        </div>
    </div>


@endsection