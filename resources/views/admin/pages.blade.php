@extends('layouts.app')

@section('title', 'Pages')

@section('content')
<div class="container-fluid">
      <div class="row">
       <!-- include nav !-->
       @include('admin.partials.nav')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Pages <!--<small><a href="{{ route('post') }}">Add New</a></small>!--></h1>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Updated at</th>
                  <th>Edit</th>
                  <!--<th>Delete</th>!-->
                </tr>
              </thead>
              <tbody>
              @foreach($pages as $page)
                <tr>
                  <td>{{ $page->id }}</td>
                  <td>{{ $page->name }}</td>
                  <td>{{ $page->updated_at->diffForHumans() }}</td>
                  <td><a href="{{ route('edit.page', $page->id) }}">Edit</a></td>
                  <!--<td><a href="">Delete</a></td>!-->
                </tr>
             @endforeach
              </tbody>
            </table>
          </div>
        </div>
          
          </div>
        </div>
@endsection
