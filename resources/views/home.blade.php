@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container"> 
 <div class="col-md-12">

        <div class="row">
          @php $i = 0; @endphp
            @foreach($posts as $index => $post)
             @php $i++; @endphp
            <div class="col-md-3">
             <div class="thumbnail">
                <img src="{{ asset('uploads/posts/thumbnail/' . $post->image) }}" alt="" class="img-responsive">
                <div class="caption">
                    <a href="{{ route('postentry', $post->slug) }}"><h3>{{ substr($post->title, 0, 24) }}@if(strlen($post->title) > 24)...@endif</h3></a>
                </div>
            </div>
        </div>
         @if($index == 4)
            </div>

            <div class="row">
            
         @endif
       
        @endforeach
     </div>

        <div class="row">
            <div class="col-md-12">
                {!! $content->body !!}
            </div>
        </div>

    </div>
</div>
@endsection
