@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h1>Gallery page</h1>
      
            <div class="row">
                
                @foreach($entries as $post)
                <div class="col-md-3">
                <div class="thumbnail">
                      <a href="{{ route('postentry', $post->slug) }}">
                        <img src="{{ asset('uploads/posts/thumbnail/' . $post->image) }}" alt="" class="img-responsive">
                      </a>
                </div>
              </div>
              @endforeach
            </div>
         </div>

    </div>

@endsection
