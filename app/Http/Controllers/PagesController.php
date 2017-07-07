<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;

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

    public function pressPage() {
        return view('genreal.press');
    }
}
