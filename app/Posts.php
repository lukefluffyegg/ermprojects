<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Posts extends Model
{

    use Sluggable;

    protected $table = 'posts';

      protected $fillable = [
            'id','title','slug','description','image',
        ];

    public function subcategoy() {
        return $this->belongsTo('App\CategoryItem');
    }

    public function photos() {
         return $this->hasMany('App\PostsGallery');
    }

      public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
