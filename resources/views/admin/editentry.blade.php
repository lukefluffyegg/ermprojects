@extends('layouts.app')

@section('content')

<script>
tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
</script>

<div class="container-fluid">
      <div class="row">
       <!-- include nav !-->
       @include('admin.partials.nav')
        <div class="col-md-12">

                <div class="panel-body">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}


                <div class="form-group{{ $errors->has('subcategory') ? ' has-error' : '' }}">
                <label for="subcategory" class="col-md-4 control-label">Sub Category</label>

                <div class="col-md-7">

                    <select id="subcategory" class="form-control" name="subcategory">
                        <option>Select a subcategory</option>
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

        <input type="hidden" name="post_id" value="">
       
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
                <input type="hidden" name="temp_post_id" value="{{ $post->id }}">
            </form>
      </div>
    </div>

        <div class="col-md-12">
      
            <div id="gallery-images">
                <ul class="sortable" id="sortable">
                @foreach($postgallery as $photo)
                    <li id="item_{{ $photo->id }}">
                        <a onclick="return confirm('Are you sure you want to delete this gallery Image?');" href="" class="delete-gallery-image"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <img src="{{ asset('uploads/posts/' . $photo->image) }}" alt="">
                    </li>
                @endforeach
                </ul>
           
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
@endsection