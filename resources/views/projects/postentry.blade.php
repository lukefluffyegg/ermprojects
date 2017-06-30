@extends('layouts.app')

@section('title', $entry->title)


@section('content')
   <div class="container">
        <div class="col-md-12">
    
        <!--<a href="<?php
        /*if($_SERVER['HTTP_REFERER']=='http://ermp.app:8000/') {
        print '/subcategory/';
        } else {
        print 'javascript:window.history.back()';
        };*/
        ?>" class="btn btn-sm btn-success">&lt; back to category</a>!-->

           <div class="col-md-5">

          <h1>{{ $entry->title }}</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">{{ $entry->subCategory->name }}</a></li>
        <li class="breadcrumb-item active">{{ $entry->title }}</li>
    </ol>

        

        {!! $entry->description !!}

        
  </div> 

          <div class="col-md-7">
            <div class="main-image">
            <img src="{{ asset('uploads/posts/' . $entry->image) }}" alt="" style="width:100%; height: auto; margin-bottom: 1em; margin-top: 1em;">
            </div>

            @php
                $photoscount = 0
            @endphp

            <div class="row">
                @foreach($photos as $photo)
                    <a href="#">
                        <img src="{{ asset('uploads/posts/' . $entry->image) }}" alt="" style="width:33%; height: auto; margin-bottom: 1em; margin-top: 1em;">
                    </a>
                    @php
                     $photoscount++;
                     @endphp
                @endforeach

            @if($photoscount < 1) 
            There are no additional photos
            @endif
            </div>

          </div>

      
</div>
</div>

@endsection