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
    <form action="{{ route('admin.posts.update', ['post' => $post->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="title" class="form-control" id="title" name="title" value="{{ old('content', $post->content) }}">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category:</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">Nothing</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <h5>Tags</h5>
        <div class="mb-3">
            @foreach ($tags as $tag)
                @if ($errors->any())
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" 
                        value="{{$tag->id}}" 
                        id="tag-{{$tag->id}}" 
                        name="tags[]" 
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : ''}}>
                        <label class="form-check-label" for="tag-{{$tag->id}}">
                        {{$tag->name}}
                        </label>
                    </div> 
                @else   
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" 
                        value="{{$tag->id}}" 
                        id="tag-{{$tag->id}}" 
                        name="tags[]" 
                        {{ $post->tags->contains($tag) ? 'checked' : ''}}>
                        <label class="form-check-label" for="tag-{{$tag->id}}">
                        {{$tag->name}}
                        </label>
                    </div> 
                @endif
            @endforeach
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{ old('content') ? old('content') : $post->content  }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="image" name="image">

            <img src="{{asset('/storage/' . $post->cover)}}" alt="" class="w-50">
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
    </form>
@endsection