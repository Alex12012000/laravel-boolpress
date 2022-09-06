@extends('layouts.dashboard')

@section('content')

    <h1>{{$post->title}}</h1>
    <br>

    <span>{{$post->slug}}</span>
    <p>{{$post->content}}</p>

    <a href="{{ route('admin.posts.edit', ['post' => $post->id])}}" class="btn btn-primary" >Edit</a>
    
@endsection