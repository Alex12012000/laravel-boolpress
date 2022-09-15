@extends('layouts.dashboard')

@section('content')

    <h1>{{$post->title}}</h1>
    <br>

    @if ($post->cover)
        <div class="img">
            <img src="{{asset('/storage/' . $post->cover)}}" alt="">
        </div>
    @endif

    <ul class="list-unstyled">
        <li>
            <b>Created at:</b> {{$post->created_at->toFormattedDateString()}}
        </li>
        <li>
            <b>Updated at:</b> {{$post->updated_at->toFormattedDateString()}}
        </li>
        <li>
            <b>Slug:</b> {{$post->slug}}
        </li>
        <li>
            <b>Category:</b> {{$post->category ? $post->category->name : 'Nothing'}}
        </li>
        <li>
            <b>Tag:</b>
            @if (!$post->tags->isEmpty())
                @foreach ($post->tags as $tag)
                    {{$tag->name}}{{!$loop->last ? ',' : ''}}
                @endforeach
            @else
                Nothing
            @endif
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