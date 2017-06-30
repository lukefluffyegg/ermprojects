@extends('layouts.app')

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h2>Gallery page</h2>
      
            <div class="row">
                
                @foreach($entries as $post)
                <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('uploads/posts/' . $post->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href=""><h3>{{ $post->title }}</h3></a>
                        <p>{!! $post->description !!}</p>
                    </div>
                </div>
              </div>
              @endforeach
            </div>
         </div>

    </div>

@endsection
