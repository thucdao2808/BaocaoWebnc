<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'image_path',
        'description',
        'quantity',
        'price',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function galleries() {
        return $this->hasMany(Gallery::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tag','product_id','tag_id')->withTimestamps();
    }

}
