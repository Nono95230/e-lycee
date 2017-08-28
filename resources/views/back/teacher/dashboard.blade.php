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
        #manage-posts ul,
        #manage-qcms ul,
        #statistiques ul{
            list-style-type:none;
            padding-left:20px;
		}
		.element-status{
            display:inline-block;
			width:15px;
            height:15px;
            cursor:pointer;
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
        #manage-posts .panel-heading h3,
        #manage-qcms .panel-heading h3{
            margin:10px 0;
            width:calc(100% - 40px);
        }

        @media (max-width: 991px) {
            #manage-posts .panel-heading h3,
            #manage-qcms .panel-heading h3{
                text-align:center;
            }
        }
        .panel-heading{
            position:relative;
        }
        .panel-heading .entityCountContainer{
            position:absolute;
            top:-15px;
            right:-15px;
            width: 70px;
            height:65px;
            border-radius:50%;
            background-color: white;
        }
        .panel-heading .entityCount{/*#23527c;#337ab7;foncé;clair;*/
            width: 50px;
            height:auto;
            position: absolute;
            top:20px;
            right:16px;
            color:#337ab7;
            font-size: 1.6em;
            font-weight: bold;
            text-align: center;
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
                <div class="panel-heading">
                    <h3>Gestion des articles</h3>
                    <div class="entityCountContainer">
                        <span class="entityCount">{{ $countPosts }}</span>
                    </div>
                </div>
                <div class="panel-body">
                    <h4>Les Articles les plus récents </h4>
                    @foreach ($postsRecent as $post)
                        <ul>
                            <li>
                                <span class="element-title">{{ $post->title }}</span>
                                <span class="element-status {{ ($post->status === 'published')? 'green':'red'}}" title="{{ ($post->status !== 'published')? 'Non ':''}}Publié"></span>
                            </li>
                        </ul>
                    @endforeach
                    <a href="{{route ('post.index')}}">Voir tous les Articles </a>
                </div>
            </div>
        </div>

        <!-- GESTION DES QCM -->
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div id="manage-qcms" class="panel panel-info">
                <div class="panel-heading">
                    <h3>Gestion des QCM</h3>
                    <div class="entityCountContainer">
                        <span class="entityCount">{{ $countQcms }}</span>
                    </div>
                    
                </div>
                <div class="panel-body">
                    <h4>Les QCM les plus récents </h4>
                    @foreach ($qcmsRecent as $qcm)
                        <ul>
                            <li>
                                <span class="element-title">{{ $qcm->title }}</span>
                                <span class="element-status {{ ($qcm->status === 'published')? 'green':'red'}}" title="{{ ($qcm->status !== 'published')? 'Non ':''}}Publié"></span>
                            </li>
                        </ul>
                    @endforeach
                    <a href="{{route ('qcm.index')}}">Voir tous les QCM </a>
                </div>
            </div>
        </div>
        <!-- STATISTIQUES -->
        <div class="col-xs-12 col-md-12 col-lg-4">
            <div id="statistiques" class="panel panel-info">
                <div class="panel-heading text-center">
                    <h3>Statistiques</h3>
                </div>
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