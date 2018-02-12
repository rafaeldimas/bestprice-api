<?php

namespace BestPrice\Domains\Products;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Photo
 * @package BestPrice\Domains\Products
 */
class Photo extends Model
{
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
