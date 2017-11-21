<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryItem;
use App\PostsGallery;
use App\Posts;
use App\Tag;

class ProjectsController extends Controller
{
    public function index(Category $category) {
        $categories = $category->where('parent_id', '=', null)->where('id', '!=', '11')->get();

        return view('projects.index')->with('categories', $categories);
    }

    public function subcategories(Category $category, $slug) {
        
        $categories = $category->where('slug', '=', $slug)->first();

        $subcategories = Category::where('parent_id', '=', $categories->id)->get();

        return view('projects.subcategories')->with('subcategories', $subcategories)->with('categories', $categories);
    }

    public function subcategory(Category $category, $slug) {
        $subcategories = $category->where('slug', '=', $slug)->first();

        $posts = Posts::where('sub_cat_id', '=', $subcategories->id)->get();

        return view('projects.subcategory')->with('posts', $posts)->with('subcategories', $subcategories);
    }

    public function postEntry(Posts $posts, $slug) {
        $entry = $posts->where('slug', '=', $slug)->first();
        $photos = PostsGallery::where('post_id', '=', $entry->id)->get();

        return view('projects.postentry')->with('entry', $entry)->with('photos', $photos);
    }

    public function showTaggedPosts($id) {
        $tag = Tag::find($id);
        return view('tags.show')->with('tag', $tag);
    }
}
