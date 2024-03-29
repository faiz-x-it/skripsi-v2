<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    // public function books()
    // {
    //     return $this->hasMany('App\Product');
    // }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
