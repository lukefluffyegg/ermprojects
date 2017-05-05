<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryItem;
use App\Posts;

class ProjectsController extends Controller
{
    public function index(Category $category) {
        $categories = $category->get();

        return view('projects.index')->with('categories', $categories);
    }

    public function subcategories(Category $category, $slug) {
        
        $categories = $category->where('slug', '=', $slug)->first();

        $subcategories = Category::where('parent_id', '=', $categories->id)->get();

        return view('projects.subcategories')->with('subcategories', $subcategories);
    }

    public function subcategory(Category $category, $slug) {
        $subcategories = $category->where('slug', '=', $slug)->first();

        $posts = Posts::where('sub_cat_id', '=', $subcategories->id)->get();

        return view('projects.subcategory')->with('posts', $posts)->with('subcategories', $subcategories);
    }

    public function postEntry(Posts $posts, $slug) {
        $entry = $posts->where('slug', '=', $slug)->first();

        return view('projects.postentry')->with('entry', $entry);
    }
}
