<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

      protected $fillable = [
            'id','title','slug','description','image',
        ];

    public function subcategoy() {
        return $this->belongsTo('App\CategoryItem');
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
