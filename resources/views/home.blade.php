@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container"> 
 <div class="col-md-12">
    <h1>Home</h1>

        <div class="row">

            @foreach($posts as $post)
            <div class="col-md-3">
             <div class="thumbnail">
                <img src="{{ asset('uploads/posts/' . $post->image) }}" alt="" class="img-responsive">
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
