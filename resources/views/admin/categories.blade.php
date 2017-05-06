@extends('layouts.app')

@section('content')
<div class="container-fluid">
      <div class="row">
       <!-- include nav !-->
       @include('admin.partials.nav')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Categories <small><a href="{{ route('new.category') }}">Add New</a></small></h1>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Parent Name</th>
                  <th>Created at</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  @if($category->parent_id == null)
                    <td></td>
                    @else
                    <td>{{ $category->parent->name }}</td>
                  @endif
                  <td>{{ $category->created_at->diffForHumans() }}</td>
                  <td><a href="{{ route('edit.category', $category->id) }}">Edit</a></td>
                  <td><a href="{{ route('category.delete', $category->id) }}">Delete</a></td>
                </tr>
             @endforeach
              </tbody>
            </table>
          </div>
        </div>
          
          </div>
        </div>
@endsection
