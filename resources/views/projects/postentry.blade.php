@extends('layouts.app')

@section('title', $entry->title)


@section('content')
   <div class="container">
        <div class="col-md-12">
    

    <div style="margin-left:1.5%">
     <a href="<?php
        if($_SERVER['HTTP_REFERER']=='http://ermp.app:8000/') {
        print '/subcategory/';
        } else {
        print 'javascript:window.history.back()';
        };
        ?>" class="btn btn-sm btn-success post-entry-back">&lt; back</a>

        </div>
          
         <div class="col-md-5">

          <h1 class="entry-title">{{ $entry->title }}</h1>

        <div class="tags">
            @foreach($entry->tags as $tag)
                <a href="{{ route('tags.show', $tag->id) }}"><span class="label label-default tags">{{ $tag->name }}</span></a>
            @endforeach
        </div>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">{{ $entry->subCategory->name }}</a></li>
        <li class="breadcrumb-item active">{{ $entry->title }}</li>
    </ol>


        
       <div class="entry-content"> 
          {!! $entry->description !!}
      </div>
        <hr>

        <div class="tags">
            @foreach($entry->tags as $tag)
                <a href="{{ route('tags.show', $tag->id) }}"><span class="label label-default tags">{{ $tag->name }}</span></a>
            @endforeach
        </div>

        
      </div> 

          <div class="col-md-7">
            <div class="main-image">
            <a href="{{ asset('uploads/posts/' . $entry->image) }}" data-featherlight="image">
                <img src="{{ asset('uploads/posts/' . $entry->image) }}" alt="" style="width:100%; height: auto; margin-bottom: 1em; margin-top: 1em;">
            </a>
            </div>

            @php
                $photoscount = 0
            @endphp

            <div class="row">
                @foreach($photos as $photo)
                    <div class="col-md-4">
                    <a href="{{ asset('uploads/posts/' . $photo->image) }}" class="allery" data-fancybox="gallery" data-caption="{{ $photo->name }} <br> {{ $photo->description }}">
                        <img src="{{ asset('uploads/posts/thumbnail/' . $photo->image) }}"  alt="" style="width: 100%; height: auto; margin-bottom: 1em; margin-top: 1em;">
                    </a>
                    </div>

                    @php
                     $photoscount++;
                     @endphp
                @endforeach

            @if($photoscount < 1)
            <div class="col-md-6">
                <!-- Could put a message saying no photos !-->
            </div>
            @endif
            </div>

            @if($entry->vimeo_id != null)

            <div class="media">
                <iframe src="https://player.vimeo.com/video/{{ $entry->vimeo_id }}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>

            @else
                <div class="col-md-6">
                <!-- Could put a message saying no vid !-->
                </div>
            @endif


          </div>

      
</div>
</div>

@endsection