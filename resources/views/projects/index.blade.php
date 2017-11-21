@extends('layouts.app')

@section('title', 'Projects')

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h1>Categories</h1>
        <br>

             @php
                $categorycount = 0
            @endphp
        
            <div class="row">
         
                @foreach($categories as $index => $category)
                <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('uploads/category/thumbnail/' . $category->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href="{{ route('category', $category->slug) }}"><h3>{{ substr($category->name, 0, 24) }}@if(strlen($category->name) > 24)...@endif</h3></a>
                        <p>{{ substr(strip_tags($category->description), 0, 100) }}@if(strlen($category->description) > 100)...@endif</p>
                    </div>
                </div>
            </div>
           

             @if($index > 4) 
               </div>
               <div class="row">
             @endif

              @endforeach

            </div>
           
        
        </div>
   </div>
@endsection
