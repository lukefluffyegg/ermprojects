<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryItem extends Model
{
    //protected $guarded = ['id'];

    protected $table = 'categoryitems';

    protected $fillable = [
        'id','parent_id','name','slug','description','image',
    ];

    public function parent()
    {
        return $this->belongsTo('App\Category');
    }

    public function posts() {
        return $this->hasMany('App\Posts');
    }
}
