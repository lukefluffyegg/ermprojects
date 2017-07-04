@extends('layouts.app')

@section('title', 'Edit - ' . $post->title)

@section('stylesheets')

<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

@endsection

@section('content')

<div class="container-fluid">
      <div class="row">
       <!-- include nav !-->
       @include('admin.partials.nav')
        <div class="col-md-12">

                <div class="panel-body">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ route('post.edit', $post->id) }}">
                        {{ csrf_field() }}


                <div class="form-group{{ $errors->has('subcategory') ? ' has-error' : '' }}">
                <label for="subcategory" class="col-md-4 control-label">Sub Category</label>

                <div class="col-md-7">

                    <select id="subcategory" class="form-control" name="subcategory">
                    @foreach($subcategorys as $sub_cat)
                        <option value="{{ $sub_cat->id }}" <?php if($post->sub_cat_id == $sub_cat->id) { echo 'selected="selected"'; } ?>>{{ $sub_cat->name }}</option>
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

                <div class="col-md-7">
                <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}">

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                </div>
            </div>


        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>

            <div class="col-md-7">
            <textarea id="description" class="form-control" name="description">{{ $post->description }}</textarea>

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
            </div>
        </div>

                    <div class="form-group{{ $errors->has('vimeo_id') ? ' has-error' : '' }}">
                <label for="vimeo_id" class="col-md-4 control-label">Vimeo Link ID</label>

                <div class="col-md-7">

                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon3">https://player.vimeo.com/video/</span>
                <input id="vimeo_id" type="text" class="form-control" name="vimeo_id" value="{{ $post->vimeo_id }}">

                </div>

                @if ($errors->has('vimeo_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('vimeo_id') }}</strong>
                    </span>
                @endif
                </div>
            </div>


             <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                <label for="tag_id" class="col-md-4 control-label">Tags</label>

                <div class="col-md-7">

                    <select id="tags" class="form-control select2-multi" name="tags[]" multiple="multiple">
                        <option>Select a Tag</option>
                        @foreach($tags as $tag)
                          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('tags'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tags') }}</strong>
                        </span>
                    @endif
                </div>
            </div>



        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
            <label for="image" class="col-md-4 control-label">Featured Image</label>

            <div class="col-md-7">
                <input type="file" name="image"  id="inputImage">
                <img style="display:none; width:250px;" id="mainImage" src="" alt="your image" />
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <input type="hidden" name="post_id" value="{{ $post->id }}">

       
        <div class="form-group" >
            <div class="col-md-7 col-md-offset-4">
                <button type="submit" id="postsubmit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div> 
     </form>

    <div class="form-group">
        <label for="galleryimages" class="col-md-4 control-label">Gallery Images</label>
      <div class="col-md-7">
            <form action="{{ route('imagesupload') }}" class="dropzone" id="addImages">
                {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{ $post->id }}">
            </form>
      </div>
    </div>

          <div class="form-group">

          <div class="col-md-8 right">
              
         
      
            <div id="gallery-images">
                <ul class="sortable">
                @foreach($postgallery as $photo)
                    <li id="item_{{ $photo->id }}">
                        <a onclick="return confirm('Are you sure you want to delete this gallery Image?');" href="{{ route('delete.gallery.image', $photo->id) }}" class="delete-gallery-image"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <img src="{{ asset('uploads/posts/' . $photo->image) }}" alt="">
                    </li>
                @endforeach
                </ul>
            </div>
            </div>
     
       </div>

    <!--<div class="form-group">
    <div class="col-md-7 col-md-offset-4" style="padding-top:10px;">
        <button id="triggersubmit" class="btn btn-primary">Create</button>
    </div>
    </div>!-->

        </div>
    </div>
</div>

@section('js')

    <script src="{{ URL::asset('js/select2.min.js') }}"></script>

    <script type="text/javascript">
        $(".select2-multi").select2();
        $(".select2-multi").select2().val({!! $post->tags()->allRelatedIds() !!}).trigger('change');
    </script>


@endsection


@endsection