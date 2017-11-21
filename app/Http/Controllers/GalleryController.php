<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\PostsGallery;
use DB;

class GalleryController extends Controller
{
    public function index(Posts $posts, Request $request) {
        $entries = $posts->take(10)->paginate($request->get('per-page', 30));

        return view('gallery.index')->with('entries', $entries);
    }

    public function PhotoData() {
        if(isset($_POST['id'])) {
            $id = $_POST['id'];

           $sqlStatement = "SELECT * FROM `posts_galleries` WHERE id='$id'";

           $query = DB::select($sqlStatement);


            foreach($query as $info) {
                echo '<div class="form-group">';
                echo '<label for="title-name" class="control-label">Name:</label>';
                echo '<input type="text" class="form-control" id="title-name" name="name" value="' . $info->name . '">';
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label for="description-text" class="control-label">Description:</label>';
                echo '<textarea class="form-control" id="description-text" name="description">'. $info->description .'</textarea>';
                echo '</div>';
                echo '<input type="hidden" name="photogalleryid" value="' . $info->id . '">';
            }
        }

        //return $query; 
    }
}
