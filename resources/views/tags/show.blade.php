@extends('layouts.app')

@section('title', $tag->name . " Tag Posts")

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h1>{{ $tag->name }} tag <small>{{ $tag->posts()->count() }} Posts</small></h1>

        <br>
        
            <div class="row">
                @foreach($tag->posts as $post)
                <div class="col-md-4">
                 <div class="thumbnail">
                    <img src="{{ asset('uploads/posts/thumbnail/' . $post->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href="{{ route('postentry', $post->slug) }}"><h3>{{ substr($post->title, 0, 24) }}@if(strlen($post->title) > 24)...@endif</h3></a>
                    </div>
                  </div>
                </div>
              @endforeach
         </div>
        </div>
   </div>

@endsection
