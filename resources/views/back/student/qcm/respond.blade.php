@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	
	<style>
		/*
		 * CSS TABLEAU
		 */
		table,th{
		  text-align:center;
		}
		table thead tr th:first-child,
		table tbody tr td:first-child,
		table thead tr th:nth-child(2),
		table tbody tr td:nth-child(2){
		  text-align:left;
		}
		table thead tr th:last-child,
		table tbody tr td:last-child{
		  text-align:right;
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


		/*
		 * CSS REGION - CONTENT_TOP
		 */
		#btn-add,
		#btn-return{
			margin-top:22px;
		}
		.content_second{
			min-height:80px;
		}
		#flash-message{
			margin-bottom:10px;
		}
		#perpage{
			padding-left:8px;
		}
		#total{
			padding-right:8px;
		}
		.pagination .per_page_title,
		.pagination .total{
			padding:6px 12px;
			text-align: center;
			border-top-left-radius:4px;
			border-top-right-radius:4px;
		}
		.pagination .total{
			border-bottom-left-radius:4px;
			border-bottom-right-radius:4px;
		}
		.pagination#perpage li a{
		  	margin-left:0;
		}
		.pagination#perpage li.first a{
			border-top-left-radius:0px;
			border-bottom-left-radius:4px;
		}
		.pagination#perpage li:last-child a{
			border-top-right-radius:0px;
		}

	</style>

@endsection

@section('content_top')

<div class="content_first">
	<!-- Title -->
	<div class="row">
		<div class="col-xs-8">
			<h1>{{ $title}}</h1>
		</div>
		<div class="col-xs-4">
			<a id="btn-return" type="button" class="btn btn-success pull-right" href="{{route('student.qcm.index')}}"><i class="fa fa-angle-double-left fa-fw" aria-hidden="true"></i>
			 Retour aux Qcm</a>
		</div>
	</div>
</div>

@endsection


@section('content')
    <form method="POST" action="{{ route('student.qcm.calculate.score',$qcm) }}">
    	{{ csrf_field() }}
    	<div class="row">
			@for($i = 0;$i < count($qcmQuestion); $i++)
				<h3>Question n°{{ $i+1 }}</h3>
				<div class="col-xs-12 col-md-8 col-lg-9">
					<p>{{ $qcmQuestion[$i]->content }}</p>
				</div>
				<div class="col-xs-12 col-md-4 col-lg-3">
					{!! Form::radioMacro(
						($i+1),
						'answer',
						'qcmQuestion',
						['yes','no'],
						$errors? $errors : null,
						old('answer'.($i+1))
						) 
					!!}
				</div>
			@endfor
    	</div>
		<div class="row">
			<div class="col-md-12 text-center">
				{!! Form::submitMacro('add','qcmQuestion') !!}
			</div>
		</div>

    </form>

@endsection


@section('javascript')

    <script type="text/javascript">
		
    </script>

@endsection