@extends('layout')

@section('content')
<h1>La page de {{$user->name}}</h1>
<h3>Ses chansons</h3>

@include("_songs", ["songs" =>$user->songs])

@endsection