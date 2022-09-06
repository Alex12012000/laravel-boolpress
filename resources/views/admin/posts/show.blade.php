@extends('layouts.dashboard')

@section('content')

    <h1>{{$post->title}}</h1>
    <br>

    <ul class="list-unstyled">
        <li>
            <b>Created at:</b> {{$post->created_at}}
        </li>
        <li>
            <b>Updated at:</b> {{$post->updated_at}}
        </li>
        <li>
            <b>Slug:</b> {{$post->slug}}
        </li>
    </ul>
    <div class="mt-2">
        <p>{{$post->content}}</p>
    </div>

    <div class="d-flex align-items-center">
        <a href="{{ route('admin.posts.edit', ['post' => $post->id])}}" class="btn btn-primary mr-2">Edit</a>
        {{-- Delete --}}
        <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <input type="submit" value="Delete" onClick="return confirm('Do you want to delete this post?');" class="btn btn-danger">
        </form>
    </div>
    
@endsection