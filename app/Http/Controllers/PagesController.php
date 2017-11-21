<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use App\Posts;

class PagesController extends Controller
{
    public function index(Request $request, Pages $pages, $slug) {
       $slug = $request->slug;

       $page = $pages->where('slug', '=', $slug)->first();

       return view('pages')->with('page', $page);
    }

    public function nav(Pages $pages) {
        $pages = $pages->get();

        return $pages;
    }

    public function pressPage(Posts $post) {
        $posts = $post->where('sub_cat_id', '=', '12')->get();
        return view('genreal.press')->with('posts', $posts);
    }
}
