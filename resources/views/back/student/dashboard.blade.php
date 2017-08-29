@extends('layouts.back')

@section('title', $title)


@section('stylesheet')


@endsection

@section('content_top')

<div class="content_first">
    <!-- Title -->
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $title}}</h1>
        </div>
</div>

@endsection

@section('content')
    
    <h1>Toto le ouf</h1>

@endsection

@section('javascript')


@endsection