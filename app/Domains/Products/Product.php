<?php

namespace BestPrice\Domains\Products;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package BestPrice\Domains\Products
 */
class Product extends Model
{
    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
