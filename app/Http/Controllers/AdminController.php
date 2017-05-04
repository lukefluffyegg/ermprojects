<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\CategoryItem;
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

        return view('admin.newentry')->with('subcategories', $subcategories);
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

     return redirect()->route('post');

    }
}
