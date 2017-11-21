@extends('layouts.app')

@section('title', 'Press')

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h1>Press</h1>
        
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-3">
                <div class="thumbnail">
                    <a href="{{ route('postentry', $post->slug) }}"><img src="{{ asset('uploads/posts/thumbnail/' . $post->image) }}" alt="" class="img-responsive"></a>
                    <div class="caption">
                        <a href="{{ route('postentry', $post->slug) }}"><h3>{{ substr($post->title, 0, 20) }}</h3></a>
                        <p>{!! substr(strip_tags($post->description), 0, 300) !!}</p>
                    </div>
                  </div>
                </div>
              @endforeach
         </div>
        </div>
   </div>
@endsection