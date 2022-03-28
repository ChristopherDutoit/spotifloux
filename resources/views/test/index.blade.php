@extends('layout')  
@section('content')
@Auth
<h1 class="auth">Salut {{Auth ::user()->name}}, heureux de te retrouver</h1>

@endAuth
@include("_songs", ["songs" =>$lastSongs, "type" => "dernières publications"])
@include("_songs", ["songs" =>$followSongs, "type" => "Mes abonnements"])
<h1 class="auth">Mes Playlists</h1>
@foreach($playlists as $playlist)
<a href="/playlist/{{$playlist->id}}">{{$playlist -> title}}</a>
@endforeach
 
@endsection