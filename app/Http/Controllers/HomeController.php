<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Pages;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Posts $posts, Pages $pages)
    {
        $posts = $posts->orderBy('updated_at', 'DESC')->take(4)->get();
        
        $content = $pages->where('slug', '=', 'home')->first();

        return view('home')->with('posts', $posts)->with('content', $content);
    }

}
