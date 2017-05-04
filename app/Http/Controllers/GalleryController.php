<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class GalleryController extends Controller
{
    public function index(Posts $posts, Request $request) {
        $entries = $posts->take(10)->paginate($request->get('per-page', 30));

        return view('gallery.index')->with('entries', $entries);
    }
}
