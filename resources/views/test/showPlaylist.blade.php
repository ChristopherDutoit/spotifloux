

@extends('layout')  
@section('content')

<h1 class="auth">{{$id}}</h1>
@include("_songs", ["songs" =>$songs, "type" => "Les musiques"])
 
@endsection
