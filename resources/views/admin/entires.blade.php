@extends('layouts.app')

@section('content')
<div class="container-fluid">
      <div class="row">
       <!-- include nav !-->
       @include('admin.partials.nav')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Posts <small><a href="{{ route('post') }}">Add New</a></small></h1>

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
              @foreach($entires as $entry)
                <tr>
                  <td>{{ $entry->id }}</td>
                  <td>{{ $entry->title }}</td>
                  <td>{{ $entry->subCategory->name }}</td>
                  <td>{{ $entry->created_at->diffForHumans() }}</td>
                  <td><a href="{{ route('edit.post', $entry->id) }}">Edit</a></td>
                  <td><a href="{{ route('deletepost', $entry->id) }}">Delete</a></td>
                </tr>
             @endforeach
              </tbody>
            </table>
          </div>
        </div>
          
          </div>
        </div>
@endsection
