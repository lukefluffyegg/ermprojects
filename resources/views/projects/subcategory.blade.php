@extends('layouts.app')

@section('title', $subcategories->name)

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h1>{{ $subcategories->name }} entries</h1>
        {!! $subcategories->description !!}

        <br>

             @php
                $categorycount = 0
            @endphp

            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4">
                 <div class="thumbnail">
                    <img src="{{ asset('uploads/posts/thumbnail/' . $post->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href="{{ route('postentry', $post->slug) }}"><h3>{{ substr($post->title, 0, 24) }}@if(strlen($post->title) > 24)...@endif</h3></a>
                    </div>
                  </div>
                </div>

              @php
             $categorycount++;
             @endphp
             @endforeach
              @if($categorycount < 1)
            <div class="col-md-6">
                <!-- Could put a message saying no photos !-->
            </div>
            @endif
         </div>
        </div>
   </div>

@endsection
