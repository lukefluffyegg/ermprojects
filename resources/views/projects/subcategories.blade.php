@extends('layouts.app')

@section('title', 'Subcategories')

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h1>{{ $categories->name }}</h1>
        {!! $categories->description !!}

        <br>


              @php
                $categorycount = 0
            @endphp
        
            <div class="row">
                @foreach($subcategories as $subcategory)
                <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('uploads/category/thumbnail/' . $subcategory->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href="{{ route('subcategory', $subcategory->slug) }}"><h3>{{ substr($subcategory->name, 0, 24) }}@if(strlen($subcategory->name) > 24)...@endif</h3></a>
                        <p>{!! substr(strip_tags($subcategory->description), 0, 100) !!}@if(strlen($subcategory->description) > 100)...@endif</p>
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
