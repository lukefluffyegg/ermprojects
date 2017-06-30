@extends('layouts.app')

@section('title', 'Projects')

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h1>Categories</h1>
        
            <div class="row">
         
                @foreach($categories as $category)
                <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('uploads/category/thumbnail/' . $category->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href="{{ route('category', $category->slug) }}"><h3>{{ $category->name }}</h3></a>
                        <p>{{ substr(strip_tags($category->description), 0, 300) }}</p>
                    </div>
                </div>
            </div>
              @endforeach
           
          </div>
        </div>
   </div>
@endsection
