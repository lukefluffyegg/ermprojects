@extends('layouts.app')

@section('content')
   <div class="container">
        <h2>{{ $page->name }}</h2>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                     {!! $page->body !!}
                </div>
           </div>
        </div>
   </div>
@endsection