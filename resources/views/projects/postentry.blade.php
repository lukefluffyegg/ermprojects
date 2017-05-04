@extends('layouts.app')

@section('content')
   <div class="container">
        <h3>{{ $entry->title }}</h3>
        <img src="{{ asset('uploads/posts/' . $entry->image) }}" style="width:350px">
        <p>{!! $entry->description !!}</p>
   </div>

@endsection