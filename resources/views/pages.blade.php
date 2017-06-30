@extends('layouts.app')

@section('content')
   <div class="container">
  <div class="col-md-12">
        <h2>{{ $page->name }}</h2>
        
         <div class="main-content"> 
          
          {!! $page->body !!}
            
           </div>
        </div>
   </div>
@endsection