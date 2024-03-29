<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tendor extends Model
{
    protected $guarded = [];
    protected $table = 'tendor';

    public function books()
    {
        return $this->hasMany('App\product');
    }
    public function image()
    {
        return $this->belongsTo('App\Image');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /*
     * Image Accessor
     */
    public function getImageUrlAttribute($value)
    {
        return asset('/').'assets/img/'.$this->image->file;
    }
    public function getDefaultImgAttribute($value)
    {
        return asset('/').'assets/img/'.'user-placeholder.png';
    }
}
