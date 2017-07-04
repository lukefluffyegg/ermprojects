@extends('layouts.app')

@section('title', $tag->name . " Tag Posts")

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
        
            <div class="row">
                @foreach($tag->posts as $post)
                <div class="col-md-4">
                 <div class="thumbnail">
                    <img src="{{ asset('uploads/posts/thumbnail/' . $post->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href="{{ route('postentry', $post->slug) }}"><h3>{{ $post->title }}</h3></a>
                    </div>
                  </div>
                </div>
              @endforeach
         </div>
        </div>
   </div>

@endsection
