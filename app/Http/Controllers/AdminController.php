<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use App\PostsGallery;
use App\Pages;
use Image;
use App\Tag;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.index');
    
    }

    public function entries(Request $request, Posts $posts) {
        $testentries = $posts->get();

        return view('admin.entries')->with('testentries', $testentries);
    }


    public function newEntry(Request $request, Category $category) {
        $subcategories = $category->where('parent_id', '!=', null)->get();
        $id = uniqid();
        $tags = Tag::all();

        return view('admin.newentry')
        ->with('subcategories', $subcategories)
        ->with('id', $id)
        ->with('tags', $tags);
    }

    public function postEntry(Request $request) {
    
    // Validate Entry data
    $this->validate($request, array( 
        'title' => 'required|max:255',
        'slug' => "unique:posts,slug",
        'image' => 'required',
        'vimeo_id' => 'max:255',
    ));

    $post = new Posts;

    $post->title = $request->input('title');
    $post->sub_cat_id = $request->input('subcategory');
    $post->description = $request->input('description');
    $post->vimeo_id = $request->input('vimeo_id');
    $post->temp_post_id = $request->input('post_id');

     if($request->hasFile('image')) {
         
         /*  Full Size */
             $image = $request->file('image');
             $filename = time() . '.' . $image->getClientOriginalExtension();
             $location = public_path('uploads/posts/' . $filename);
         /* End full size */

         /* Thumbnail */
             $thumbnail = $request->file('image');
             $Thumbfilename = time() . '.' . $thumbnail->getClientOriginalExtension();
             $thumbnailLocation = public_path('uploads/posts/thumbnail/' . $Thumbfilename);
         /* End Thumbnail  */

         // Thumbnail fit 
        $imagethumb =  Image::make($thumbnail)->fit(300, 300);

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
         Image::make($imagethumb)->save($thumbnailLocation);
         $post->image = $filename;
     }

     $post->save();


        // Grabbing all data from carsPhotos where the field is = to the input
        $PostsPhotosid = PostsGallery::where('temp_post_id', '=', $post->temp_post_id)->get();

        foreach($PostsPhotosid as $postphotoid) {
            $testid = $postphotoid->temp_post_id;
        }

        if(isset($testid)) {
             // Checking if the input is = to the queried id 
            if($post->temp_post_id == $testid) {
            // Updating the cars photos table
            PostsGallery::where('temp_post_id', '=', $post->temp_post_id)->update([
                'post_id' => $post->id,
                'temp_post_id' => null,
            ]);
        }

    }

        return redirect()->route('entries.index')->with('info', 'Entry Added');
    }


    public function galleryImageUpload(Request $request) {

        if($request->hasFile('file')) {

            /* Gallery full image size */
                $file = $request->file('file');
                $filename = rand() . '.' . strtolower($file->getClientOriginalExtension());
                $location = public_path('uploads/posts/' . $filename);
            /* End Gallery full image size */

            /* Gallery Thumbnail image size */
                $thumbnail = $request->file('file');
                $Tunmbnailfilename = rand() . '.' . strtolower($thumbnail->getClientOriginalExtension());
                $Tumblocation = public_path('uploads/posts/thumbnail/' . $filename);
            /* End Gallery Thumbnail image size */

            $imagethumb =  Image::make($thumbnail)->fit(300, 300);

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

            Image::make($imagethumb)->save($Tumblocation);
            Image::make($file)->save($location);
            $image = PostsGallery::create([
                'post_id' => $request->input('post_id'),
                'temp_post_id' => $request->input('temp_post_id'),
                'image' => $filename,
            ]); 

             return $image;
        }
    }


    public function editPost(Posts $posts, Category $category, $id) {
        $post = $posts->where('id', '=', $id)->find($id);
        $subcategorys = $category->where('parent_id', '!=', null)->get();
        $postgallery = PostsGallery::where('post_id', '=', $id)->get();

        return view('admin.editentry')
        ->with('post', $post)
        ->with('postgallery', $postgallery)
        ->with('subcategorys', $subcategorys);
    }

    public function updatePost(Request $request, Posts $posts, $id) {

        $postUpdate = $posts->find($id);

         // validate car data
        $this->validate($request, array( 
            'title' => 'required|max:255',
            'slug' => "unique:posts,slug",
            'image' => 'image',
            'vimeo_id' => 'max:255',
        ));

        $postUpdate->title = $request->input('title');
        $postUpdate->sub_cat_id = $request->input('subcategory');
        $postUpdate->description = $request->input('description');
        $postUpdate->vimeo_id = $request->input('vimeo_id');
        //$post->temp_post_id = $request->input('post_id');

        if($request->hasFile('image')) {
            
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/posts/' . $filename);


            /* Thumbnail */
                 $thumbnail = $request->file('image');
                 $Thumbfilename = time() . '.' . $thumbnail->getClientOriginalExtension();
                 $thumbnailLocation = public_path('uploads/posts/thumbnail/' . $Thumbfilename);
             /* End Thumbnail  */

            // Thumbnail fit 
            $imagethumb =  Image::make($thumbnail)->fit(300, 300);

            
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

            Image::make($imagethumb)->save($thumbnailLocation);
            Image::make($image)->save($location);
            
            $oldFilename = $postUpdate->image;
            $filepath = public_path(). '/uploads/posts/' . $oldFilename;

            $postUpdate->image = $filename;

            \File::delete($filepath);
         }

         $postUpdate->save();


        return redirect()->back()->with('info', 'Post Updated');
    }

    public function ImageGalleryDelete(PostsGallery $PostsGallery, $id) {
        $galleryImageDelete = $PostsGallery->find($id);

        $galleryImage = $galleryImageDelete->image;
        $galleryImagePath = public_path() . '/uploads/posts/' . $galleryImage;

        \File::delete($galleryImagePath);

        $galleryImageDelete->delete();

        return redirect()->back()->with('info', 'Photo Deleted');
    }



    public function PostDelete($id) {
        
        $postDelete = Posts::where('id', '=', $id)->find($id);
        $photoGallery = PostsGallery::where('post_id', '=', $id)->get();
        
        if($postDelete) {
           foreach($photoGallery as $photo) {
              $PostGalleryImage = $photo->image;

              $photo->delete();
            }

            $images = $PostGalleryImage;
        }

        $featuredImage = $postDelete->image;

        $featuredImagePath = public_path() . '/uploads/posts/' . $featuredImage;
        $carGalleryPath = public_path() . '/uploads/posts/' . $images;

        \File::delete($featuredImagePath);
        \File::delete($carGalleryPath);

        $postDelete->delete();

        return redirect()->back()->with('info','Entry Deleted');
    }

    public function categories(Category $category) {
        $categories = $category->get();

        return view('admin.categories')->with('categories', $categories);
    }

    public function newCategory(Category $category) {
         $categories = $category->where('parent_id', '=', null)->get();

         return view('admin.newcategory')->with('categories', $categories);
    }

    public function postCategory(Request $request) {
        // Validate Entry data
     $this->validate($request, array( 
        'name' => 'required|max:255',
        'slug' => "unique:posts,slug",
        'image' => 'required',
    ));

    $category = new Category;

    $category->name = $request->input('name');
    $category->parent_id = $request->input('category');
    $category->description = $request->input('description');

     if($request->hasFile('image')) {

         $image = $request->file('image');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('uploads/category/' . $filename);

         /* Categroy Thunmbnail */
             $thumbnail = $request->file('image');
             $Thumbnailfilename = time() . '.' . $thumbnail->getClientOriginalExtension();
             $Thumblocation = public_path('uploads/category/thumbnail/' . $filename);
         /* Categroy Thunmbnail end */

         $thumbImage = Image::make($thumbnail)->fit(300);

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

         Image::make($thumbImage)->save($Thumblocation);
         Image::make($image)->save($location);
         $category->image = $filename;
     }

     $category->save();

      return redirect()->route('categories')->with('Category Added');
    }

    public function editCategory(Category $category, $id) {
        $category = $category->where('id', '=', $id)->find($id);
        $categories = $category->where('parent_id', '=', null)->get();

        return view('admin.editcategory')
        ->with('category', $category)
        ->with('categories', $categories);
    }

    public function updateCategory($id, Category $category, Request $request) {
        $categoryUpdate = $category->find($id);

        $this->validate($request, array(
            'name' => 'required|max:255',
            'slug' => "unique:category,slug",
            'description' => 'required',
        ));

        $categoryUpdate->name = $request->name;
        $categoryUpdate->description = $request->description;
        $categoryUpdate->parent_id = $request->category;

        if($request->hasFile('image')) {
            
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/category/' . $filename);


         /* Categroy Thunmbnail */
             $thumbnail = $request->file('image');
             $Thumbnailfilename = time() . '.' . $thumbnail->getClientOriginalExtension();
             $Thumblocation = public_path('uploads/category/thumbnail/' . $filename);
         /* Categroy Thunmbnail end */

         $thumbImage = Image::make($thumbnail)->fit(300);


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

        Image::make($thumbImage)->save($Thumblocation);
        Image::make($image)->save($location);

        $oldFilename = $categoryUpdate->image;
        $filepath = public_path(). '/uploads/category/' . $oldFilename;

        $categoryUpdate->image = $filename;

        \File::delete($filepath);
     }

     $categoryUpdate->save();

     return redirect()->route('categories')->with('info', 'Category Updated');

    }

    public function categoryDelete($id, Category $category, Request $request) {
        // Getting category id in database
        $categoryItem = $category->find($id);

        $featuredImage = $categoryItem->image;

        $featuredImagePath = public_path() . '/uploads/category/' . $featuredImage;

        \File::delete($featuredImagePath);

        $categoryItem->delete();

        return redirect()->back()->with('info', 'Category deleted');

    }


    public function pages(Pages $pages) {
        $pages = $pages->get();

        return view('admin.pages')->with('pages', $pages);
    }

    public function editPage(Pages $pages, $id) {
        $page = $pages->where('id', '=', $id)->find($id);
        
        return view('admin.editPage')->with('page', $page);
    }

    public function updatePage(Request $request, Pages $pages, $id) {

       $pageUpdate = $pages->find($id);

       $this->validate($request, array(
            'name' => 'required|min:3|max:255',
        ));

        $pageUpdate->name = $request->name;
        $pageUpdate->body = $request->body;

        $pageUpdate->save();

        return redirect()->back()->with('info', 'Page Updated');

    }

}
