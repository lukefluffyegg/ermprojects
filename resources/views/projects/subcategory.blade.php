@extends('layouts.app')

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h2>{{ $subcategories->name }} entries</h2>

            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4">
                 <div class="thumbnail">
                    <img src="{{ asset('uploads/posts/' . $post->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href="{{ route('postentry', $post->slug) }}"><h3>{{ $post->title }}</h3></a>
                        <p>{!! substr(strip_tags($post->description), 0, 300) !!}</p>
                    </div>
                  </div>
                </div>
              @endforeach
         </div>
        </div>
   </div>

@endsection
