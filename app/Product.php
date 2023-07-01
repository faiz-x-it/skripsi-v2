<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    // protected $table = 'produk';
    /*
     * RELATIONS
     */
    public function Tendor()
    {
        return $this->belongsTo(Tendor::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function image()
    {
        return $this->belongsTo('App\Image');
    }
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }


    public function scopeLatestFirst($query)
    {
        return $query->orderBy('id', 'desc');
    }

    /*
     * Scope for search Products
     */
    public function scopeSearch($query, $term)
    {
        if($term)
        {
            $query->where(function ($q) use ($term){
                $q->where('title', 'LIKE', "%{$term}%");

                $q->orwhereHas('Tendor', function ($qr) use ($term){
                    $qr->where('name', 'LIKE', "%{$term}%");
                });
            });
        }
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
    //
    public function getImageUrl2Attribute($value)
    {
        return asset('/').'assets/img/'.$this->image->file2;
    }
    public function getDefaultImg2Attribute($value)
    {
        return asset('/').'assets/img/'.'user-placeholder.png';
    }
}



// <?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

// class Product extends Model
// {
//     use SoftDeletes;

//     protected $guarded = [];

//     public function category()
//     {
//         return $this->belongsTo(Category::class);
//     }

//     public function image()
//     {
//         return $this->belongsTo('App\Image');
//     }

//     public function reviews()
//     {
//         return $this->hasMany('App\Review');
//     }

//     public function scopeLatestFirst($query)
//     {
//         return $query->orderBy('id', 'desc');
//     }

//     public function scopeSearch($query, $term)
//     {
//         if ($term) {
//             $query->where(function ($q) use ($term) {
//                 $q->where('title', 'LIKE', "%{$term}%");
//             });
//         }
//     }

//     public function getImageUrlAttribute($value)
//     {
//         return asset('/').'assets/img/'.$this->image->file;
//     }

//     public function getDefaultImgAttribute($value)
//     {
//         return asset('/').'assets/img/'.'user-placeholder.png';
//     }

//     public function getImageUrl2Attribute($value)
//     {
//         return asset('/').'assets/img/'.$this->image->file2;
//     }

//     public function getDefaultImg2Attribute($value)
//     {
//         return asset('/').'assets/img/'.'user-placeholder.png';
//     }
// }
