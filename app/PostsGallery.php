<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsGallery extends Model
{
    protected $fillable = ['post_id','temp_post_id', 'image'];

        public function postphoto() {
            return $this->belongsTo('App\Posts', 'id');
        }
}
