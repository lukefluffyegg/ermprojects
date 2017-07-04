@extends('layouts.app')

@section('title', 'Edit - ' . $tag->name)

@section('content')

<div class="container-fluid">
      <div class="row">
       <!-- include nav !-->
       @include('admin.partials.nav')
        <div class="col-md-10">

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('tags.update', $tag->id) }}">
                        {{ csrf_field() }}


            <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                <label for="tag" class="col-md-4 control-label">Tag Name</label>

                <div class="col-md-4">
                <input id="name" type="text" class="form-control" name="name" value="{{ $tag->name }}">

                @if ($errors->has('tag'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tag') }}</strong>
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


        </div>
    </div>
</div>
@endsection