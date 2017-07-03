@extends('layouts.app')

@section('title', 'Tags')

@section('content')
<div class="container-fluid">
      <div class="row">
       <!-- include nav !-->
       @include('admin.partials.nav')
        <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-2 main">
          <h1 class="page-header">Tags</h1>
          @if(isset($tags)):
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Created at</th>
                </tr>
              </thead>
              <tbody>

              @foreach($tags as $tag)
                <tr>
                  <td>{{ $tag->id }}</td>
                  <td>{{ $tag->name }}</td>
                  <td>{{ $tag->created_at->diffForHumans() }}</td>
                </tr>

             @endforeach

              </tbody>
            </table>
          </div>
          @endif
        </div>

        <div class="col-md-4 main">
          <div class="well">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('tags.store') }}">
               {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <h3>Add a new tag</h3>
                  </div>

                <label for="name" class="col-md-1 control-label">Name</label>
               
                <div class="col-md-12">
                <input id="name" type="text" class="form-control" name="name" value="">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
            </div>


                    <div class="form-group" >
            <div class="col-md-12">
                <button type="submit" id="postsubmit" class="btn btn-primary">
                    Add
                </button>
            </div>
        </div> 

            </form>
          </div>
        </div>
          
          </div>
        </div>
@endsection
