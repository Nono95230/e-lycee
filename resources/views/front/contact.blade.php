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
    <h1>{{ $title}}</h1>
    

@endsection

@section('javascript')

    <script type="text/javascript">


    </script>

@endsection