@extends('layouts.app')

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h2>Categories</h2>
        
            <div class="row">
         
                @foreach($categories as $category)
                <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('uploads/category/' . $category->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href="{{ route('category', $category->slug) }}"><h3>{{ $category->name }}</h3></a>
                        <p>{{ $category->description }}</p>
                    </div>
                </div>
            </div>
              @endforeach
           
          </div>
        </div>
   </div>
@endsection
