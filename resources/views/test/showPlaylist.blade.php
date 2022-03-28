

@extends('layout')  
@section('content')

<h1>La playlist</h1>
@include("_songs", ["songs" =>$songs, "type" => "Les musiques"])
 
@endsection
