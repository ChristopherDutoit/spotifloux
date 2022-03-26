@extends('layout')

@section('content')
@Auth
    @if(Auth::id() != $user->id)
        @if(Auth::user()->IfollowThem->contains($user->id))
        <a href="/suivre/{{$user->id}}">Suivi</a>
        @else
        <a href="/suivre/{{$user->id}}">Suivre</a>
        @endif
    @endif
@endAuth

<ul>
    <li>{{$user->songs()->count()}} chanson(s)</li>
    <li>{{$user->theyfollowMe()->count()}} abonné(s)</li>
    <li>{{$user->IfollowThem()->count()}} abonnement(s)</li>
</ul>
<h1>La page de {{$user->name}}</h1>
<h3>Ses chansons</h3>

@include("_songs", ["songs" =>$user->songs, "type" => "Ses chansons"])

@endsection