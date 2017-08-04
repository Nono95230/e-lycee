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
	@include('partials.flash-message')
    <h1>{{ $title}}</h1>
    

@endsection
