@extends('layouts.app')

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h2>Sub categories</h2>
        
            <div class="row">
                @foreach($subcategories as $subcategory)
                <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('uploads/category/' . $subcategory->image) }}" alt="" class="img-responsive">
                    <div class="caption">
                        <a href="{{ route('subcategory', $subcategory->slug) }}"><h3>{{ $subcategory->name }}</h3></a>
                        <p>{!! substr($subcategory->description, 0, 300) !!}</p>
                    </div>
                  </div>
                </div>
              @endforeach

         </div>
        </div>
   </div>

@endsection
