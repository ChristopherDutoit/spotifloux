@extends('layout')  
@section('content')
@include("_songs", ["songs" =>$songs])
@endsection