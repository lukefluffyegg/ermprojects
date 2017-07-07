@extends('layouts.app')

@section('title', 'Press')

@section('content')
   <div class="container">
   <div class="col-md-12">
        <h1>Press</h1>

            <div class="row">
                <div class="col-md-4">
                 <div class="thumbnail">
                    <a href="{{ asset('uploads/press/20170605_131111.jpg') }}" data-featherlight="image">
                      <img src="{{ asset('uploads/press/20170605_131111.jpg') }}" alt="" class="img-responsive">
                    </a>
                  </div>
                </div>

               <div class="col-md-4">
                 <div class="thumbnail">
                    <a href="{{ asset('uploads/press/20170605_131512.jpg') }}" data-featherlight="image">
                      <img src="{{ asset('uploads/press/20170605_131512.jpg') }}" alt="" class="img-responsive">
                    </a>
                  </div>
                </div>


              <div class="col-md-4">
                 <div class="thumbnail">
                    <a href="{{ asset('uploads/press/20170605_131405.jpg') }}" data-featherlight="image">
                      <img src="{{ asset('uploads/press/20170605_131405.jpg') }}" alt="" class="img-responsive">
                    </a>
                  </div>
                </div>
         </div>
        </div>
   </div>

@endsection