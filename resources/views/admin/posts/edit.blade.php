@extends('layouts.dashboard')

@section('content')
    <h1>Edit post</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.posts.update', ['post' => $post->id])}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="title" class="form-control" id="title" name="title" value="{{ old('title') ? old('title') : $post->title  }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{ old('content') ? old('content') : $post->content  }}</textarea>
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
    </form>
@endsection