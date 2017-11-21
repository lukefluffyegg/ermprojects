@extends('layouts.app')

@section('title', 'Entries')

@section('content')
<div class="container-fluid">
      <div class="row">
       <!-- include nav !-->
       @include('admin.partials.nav')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Posts <small><a href="{{ route('post') }}">Add New</a></small></h1>
          @if(isset($testentries)):
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Created at</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

              @foreach($testentries as $test)
                <tr>
                  <td>{{ $test->id }}</td>
                  <td>{{ $test->title }}</td>
                  @if($test->parent_id == null)
                    <td></td>
                  @else
                  <td>{{ $test->subCategory->name }}</td>
                  @endif
                  <td>{{ $test->created_at->diffForHumans() }}</td>
                  <td><a href="{{ route('edit.post', $test->id) }}">Edit</a></td>
                  <td><a href="{{ route('deletepost', $test->id) }}">Delete</a></td>
                </tr>

             @endforeach
              </tbody>
            </table>
              {{ $testentries->render() }}
          </div>
          @endif
        </div>
          
          </div>
        </div>
@endsection
