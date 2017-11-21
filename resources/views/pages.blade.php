@extends('layouts.app')

@php

    if($page->slug === 'about') {
        $title = 'About';
    } elseif($page->slug === 'contact') {
        $title = 'Contact';
    }

@endphp

@section('title', $title)

@section('content')
   <div class="container">
  <div class="col-md-12">
        <h2>{{ $page->name }}</h2>

          <br>
        
         <div class="main-content"> 
          
          {!! $page->body !!}

           @if($page->slug === 'contact')

            <div class="panel panel-default">
   
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('send.contact') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Name</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     
                        

                  <div class="form-group{{ $errors->has('Bodymessage') ? ' has-error' : '' }}">
                            <label for="Bodymessage" class="col-md-3 control-label">Message</label>

                            <div class="col-md-7">
                                <textarea id="Bodymessage" class="form-control" name="Bodymessage">{{ old('Bodymessage') }}</textarea>

                                @if ($errors->has('Bodymessage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Bodymessage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     
      


                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    Send 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           @endif
            
           </div>
        </div>
   </div>
@endsection