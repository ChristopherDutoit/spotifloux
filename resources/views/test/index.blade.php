@extends('layout')  
@section('content')
@Auth
<h1 class="auth">Salut {{Auth ::user()->name}}, heureux de te retrouver</h1>

@endAuth
@include("_songs", ["songs" =>$lastSongs, "type" => "dernières publications"])

@Auth
@include("_songs", ["songs" =>$followSongs, "type" => "Mes abonnements"])
<h1 class="auth">Mes Playlists</h1>
<div class="playlist" style='height:200px;'>
@foreach($playlists as $playlist)
<a style ="color : white; font-size:25px" href="/playlist/{{$playlist->id}}">{{$playlist -> title}}</a>
@endforeach
</div>
@endAuth
 
@endsection