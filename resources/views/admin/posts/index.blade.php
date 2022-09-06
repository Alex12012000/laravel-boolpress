@extends('layouts.dashboard')

@section('content')
    <div class="row row-cols-4">
        @foreach ($posts as $post)
        {{-- Single Card --}}
            <div class="col">
                <div class="card mt-2" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                      <h5 class="card-title">{{$post->title}}</h5>
                      <a href="{{ route('admin.posts.show', ['post' => $post->id])}}" class="btn btn-primary">Check Post</a>
                      <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        
                        <input type="submit" value="Delete" onClick="return confirm('Do you want to delete this post?');" class="btn btn-danger mt-2">
                    </form>
                    </div>
                  </div> 
                </div>
        {{-- End card --}}
        @endforeach
    </div>
@endsection