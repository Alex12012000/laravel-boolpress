@extends('layouts.dashboard')

@section('content')

    <h1>{{$post->title}}</h1>
    <br>
    <p>{{$post->content}}</p>
    
@endsection