@extends('layouts.app')

@section('content')
<div class="container-fluid">
      <div class="row">
       <!-- include nav !-->
       @include('admin.partials.nav')
        <div class="col-md-10">

                <div class="panel-body">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}


                <div class="form-group{{ $errors->has('subcategory') ? ' has-error' : '' }}">
                <label for="subcategory" class="col-md-4 control-label">Sub Category</label>

                <div class="col-md-6">

                    <select id="subcategory" class="form-control" name="subcategory">
                        <option>Select a subcategory</option>
                        @foreach($subcategories as $subcategory)
                          <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('marque'))
                        <span class="help-block">
                            <strong>{{ $errors->first('subcategory') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-4 control-label">Title</label>

                <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="">

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                </div>
            </div>


        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>

            <div class="col-md-6">
            <textarea id="description" class="form-control" name="description"></textarea>

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
            <label for="image" class="col-md-4 control-label">Featured Image</label>

            <div class="col-md-6">
                <input type="file" name="image"  id="inputImage">
                <img style="display:none; width:250px;" id="mainImage" src="#" alt="your image" />
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
        </div>
       
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Post
                </button>
            </div>
        </div>
               
          </form>
        </div>
    </div>
</div>
@endsection