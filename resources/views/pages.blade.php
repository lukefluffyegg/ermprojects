@extends('layouts.app')

@php

    if($page->slug === 'about') {
        $title = 'About';
    } elseif($page->slug === 'press') {
        $title = 'Press';
    } elseif($page->slug === 'contact') {
        $title = 'Contact';
    }

@endphp

@section('title', $title)

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