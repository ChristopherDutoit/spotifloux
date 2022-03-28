@extends('layout')

@section('content')
@Auth
    @if(Auth::id() != $user->id)
        @if(Auth::user()->IfollowThem->contains($user->id))
        <a class="suivre" href="/suivre/{{$user->id}}">Suivi</a>
        @else
        <a class="suivre" href="/suivre/{{$user->id}}">Suivre</a>
        @endif
    @endif
@endAuth


<h1 class="Auteur">La page de {{$user->name}}</h1>
<ul class="liste-chanson">
    <li>{{$user->songs()->count()}} chanson(s)</li>
    <li>{{$user->theyfollowMe()->count()}} abonné(s)</li>
    <li>{{$user->IfollowThem()->count()}} abonnement(s)</li>
</ul>

@include("_songs", ["songs" =>$user->songs, "type" => "Ses chansons"])

@endsection