@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	<!-- Pagination Student Style-->
    <link href="{{ url('css/student-index.css')}}" rel="stylesheet">

@endsection

@section('content_top')

<div class="content_first">
	<!-- Title -->
	<div class="row">
		<div class="col-xs-8">
			<h1>{{ $title}} - Niveau {{ ($userRole === 'premiere')? 'Première':'Terminale' }}</h1>
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