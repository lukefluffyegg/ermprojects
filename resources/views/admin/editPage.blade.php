@extends('layouts.app')

@section('title', 'Edit - ' . $page->name)

@section('content')

<div class="container-fluid">
      <div class="row">
       <!-- include nav !-->
       @include('admin.partials.nav')
        <div class="col-md-12">

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('page.update', $page->id) }}">
                        {{ csrf_field() }}


            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-7">
                <input id="name" type="text" class="form-control" name="name" value="{{ $page->name }}">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
            </div>


        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
            <label for="body" class="col-md-4 control-label">Body</label>

            <div class="col-md-7">
            <textarea id="description" class="form-control" name="body">{{ $page->body }}</textarea>

            @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
            </div>
        </div>

       
        <div class="form-group" >
            <div class="col-md-7 col-md-offset-4">
                <button type="submit" id="postsubmit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div> 
     </form>

    <!--<div class="form-group">
    <div class="col-md-7 col-md-offset-4" style="padding-top:10px;">
        <button id="triggersubmit" class="btn btn-primary">Create</button>
    </div>
    </div>!-->

        </div>
    </div>
</div>
@endsection