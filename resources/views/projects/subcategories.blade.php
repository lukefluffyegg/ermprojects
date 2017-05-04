@extends('layouts.app')

@section('content')
   <div class="container">
        <h2>Sub categories</h2>
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                @foreach($subcategories as $subcategory)
                <div class="thumbnail">
                    <img src="{{ asset('uploads/subcategory/' . $subcategory->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href="{{ route('subcategory', $subcategory->slug) }}"><h3>{{ $subcategory->name }}</h3></a>
                        <p>{{ $subcategory->description }}</p>
                    </div>
                </div>
              @endforeach
            </div>
         </div>
        </div>
   </div>

@endsection