<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\CategoryItem;
use App\PostsGallery;
use Image;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function index() {
        return view('admin.index');
    }

    public function entires(Posts $posts, Request $request) {
        $entires = $posts->paginate($request->get('per-page', 20));

        return view('admin.entires')->with('entires', $entires);
    }

    public function newEntry(Request $request, CategoryItem $categoryitem) {
        $subcategories = $categoryitem->get();
        $id = uniqid();

        return view('admin.newentry')
        ->with('subcategories', $subcategories)
        ->with('id', $id);
    }

    public function postEntry(Request $request) {
    
    // Validate Entry data
    $this->validate($request, array( 
        'title' => 'required|max:255',
        'slug' => "unique:posts,slug",
        'image' => 'required',
    ));

    $post = new Posts;

    $post->title = $request->input('title');
    $post->sub_cat_id = $request->input('subcategory');
    $post->description = $request->input('description');
    $post->temp_post_id = $request->input('post_id');

     if($request->hasFile('image')) {
         $image = $request->file('image');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('uploads/posts/' . $filename);

         $width = Image::make($image)->width();
         $height = Image::make($image)->height();

         $newWidth = 1280;
         $newHeight = 1280;

         if($width || $height > 1280) {
            // resize image to new height but do not exceed original size
            $image = Image::make($image)->heighten($newHeight, function ($constraint) {
                $constraint->upsize();
            });

            // resize image to new width but do not exceed original size
            $image = Image::make($image)->widen($newWidth, function ($constraint) {
                $constraint->upsize();
            });
         }

         Image::make($image)->save($location);
         $post->image = $filename;
     }

     $post->save();

        $postsGalleryId = PostsGallery::where('temp_post_id', '=', $post->temp_post_id)->get();

        foreach($postsGalleryId as $postphotoid) {
            $testid = $postphotoid->temp_post_id;
        }

        // Checking if the input is = to the queried id 
        if($post->temp_post_id == $testid) {
            // Updating the cars photos table
            PostsGallery::where('temp_post_id', '=', $post->temp_post_id)->update([
                'post_id' => $post->id,
                'temp_post_id' => null,
            ]);
        }

        return redirect()->route('entires');
    }




    public function galleryImageUpload(Request $request) {

        if($request->hasFile('file')) {

            $file = $request->file('file');

            $filename = rand() . '.' . strtolower($file->getClientOriginalExtension());
            $location = public_path('uploads/posts/' . $filename);

            $width = Image::make($file)->width();
            $height = Image::make($file)->height();

            $newWidth = 1280;
            $newHeight = 1280;

            if($width || $height > 1280) {
                // resize image to new height but do not exceed original size
                $file = Image::make($file)->heighten($newHeight, function ($constraint) {
                    $constraint->upsize();
                });

                // resize image to new width but do not exceed original size
                $file = Image::make($file)->widen($newWidth, function ($constraint) {
                    $constraint->upsize();
                 });
            }

            Image::make($file)->save($location);
            $image = PostsGallery::create([
                'post_id' => $request->input('post_id'),
                'temp_post_id' => $request->input('temp_post_id'),
                'image' => $filename,
            ]); 

             return $image;
        }
    }





}
