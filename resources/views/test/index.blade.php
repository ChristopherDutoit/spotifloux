@extends('layout')  
@section('content')
@Auth
        <h1 class="auth">Salut {{Auth ::user()->name}}, heureux de te retrouver</h1>
@endAuth
@include("_songs", ["songs" =>$songs, "type" => "dernières publications"])
@endsection