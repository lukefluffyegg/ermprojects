@extends('layouts.app')

@section('content')

<div class="container-fluid">
      <div class="row">
       <!-- include nav !-->
       @include('admin.partials.nav')
        <div class="col-md-12">

        <div class="panel-body">

        <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ route('category.edit', $category->id) }}">
                {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-7">
                <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
            </div>


        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>

            <div class="col-md-7">
            <textarea id="description" class="form-control" name="description">{{ $category->description }}</textarea>

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
            <label for="image" class="col-md-4 control-label">Featured Image</label>

            <div class="col-md-7">
                <input type="file" name="image"  id="inputImage">
                <img style="width:250px; padding-top: 10px;" id="mainImage" src="{{ asset('uploads/category/' . $category->image ) }}" alt="your image" />
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
        </div>



            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
            <label for="category" class="col-md-4 control-label">Add this to a category</label>

            <div class="col-md-7">

                <select id="category" multiple class="form-control" id="sel2" name="category">
                    @foreach($categories as $categorytest)
                      <option value="{{ $categorytest->id }}" <?php echo $category->id == $categorytest->id ?  ' selected="selected"' : ''; ?>>{{ $categorytest->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('category'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category') }}</strong>
                    </span>
                @endif
            </div>
        </div>


    <div class="form-group" >
    <div class="col-md-7 col-md-offset-4">
        <button type="submit" id="postsubmit" class="btn btn-primary">
            Post
        </button>
    </div>
    </div> 

    </form>
     </div>
    </div>
</div>
@endsection