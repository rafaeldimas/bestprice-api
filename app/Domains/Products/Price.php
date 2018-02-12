<?php

namespace BestPrice\Domains\Products;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Price
 * @package BestPrice\Domains\Products
 */
class Price extends Model
{
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
