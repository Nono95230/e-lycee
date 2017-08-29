@extends('layouts.front')

@section('title', $title)

@section('sidebar')
    @parent
@endsection

@section('stylesheet')
@endsection

@section('content')
    <div class="page-title">
      <h1>{{ $title}}</h1>
    </div>
    
    <form method="POST" action="{{route('contact.send')}}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                {!! Form::inputMacro(
						'email',
						'email',
						'contact', 
						$errors? $errors : null,
						old('email')
					)
				!!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! Form::inputMacro(
						'text',
						'subject',
						'contact', 
						$errors? $errors : null,
						old('subject')
					)
				!!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! Form::textAreaMacro(
						'commentaire',
						'contact',
						$errors? $errors : null,
						old('commentaire')
					)
				!!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                {!! Form::submitMacro(
						'send',
						'contact'
					)
				!!}
            </div>
        </div>
        
    </form>

@endsection

@section('javascript')

    <!-- Page JavaScript -->
    <script src="{{ url('js/contact.js')}}"></script>

@endsection


