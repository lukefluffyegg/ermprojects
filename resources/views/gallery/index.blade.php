@extends('layouts.app')

@section('content')
   <div class="container">
        <h2>Gallery page</h2>
       <div class="col-md-12">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                @foreach($entries as $post)
                <div class="thumbnail">
                    <img src="{{ asset('uploads/posts/' . $post->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href=""><h3>{{ $post->title }}</h3></a>
                        <p>{!! $post->description !!}</p>
                    </div>
                </div>
              @endforeach
            </div>
         </div>
        </div>

    </div>

@endsection