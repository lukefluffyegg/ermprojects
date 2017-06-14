@extends('layouts.app')

@section('content')
   <div class="container">
        <h2>Categories</h2>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                @foreach($categories as $category)
                <div class="thumbnail col-md-3">
                    <img src="{{ asset('uploads/category/' . $category->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href="{{ route('category', $category->slug) }}"><h3>{{ $category->name }}</h3></a>
                        <p>{{ $category->description }}</p>
                    </div>
                </div>
              @endforeach
                </div>
                </div>
        </div>
   </div>
@endsection
