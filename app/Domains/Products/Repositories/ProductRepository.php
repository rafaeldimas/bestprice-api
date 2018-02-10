<?php

namespace BestPrice\Domains\Products\Repositories;

use BestPrice\Domains\Products\Product;
use BestPrice\Support\Domain\Repository\Repository;
use BestPrice\Domains\Products\Contracts\Repositories\ProductRepository as ProductRepositoryContract;

/**
 * Class ProductRepository
 * @package BestPrice\Domains\Products\Repositories
 */
class ProductRepository extends Repository implements ProductRepositoryContract
{
    /**
     * @var string
     */
    protected $modelClass = Product::class;
}