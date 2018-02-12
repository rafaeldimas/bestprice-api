<?php

namespace BestPrice\Domains\Products;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package BestPrice\Domains\Products
 */
class Category extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
