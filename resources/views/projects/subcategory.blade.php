@extends('layouts.app')

@section('content')
   <div class="container">
        <h2>{{ $subcategories->name }} entries</h2>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                @foreach($posts as $post)
                <div class="thumbnail col-md-4">
                    <img src="{{ asset('uploads/posts/' . $post->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href="{{ route('postentry', $post->slug) }}"><h3>{{ $post->title }}</h3></a>
                        <p>{{ substr(strip_tags($post->description), 0, 300) }}</p>
                    </div>
                </div>
              @endforeach
            </div>
         </div>
        </div>
   </div>

@endsection
