<?php


namespace App\Writer;

use App\Product\ShopProduct;

abstract class ShopProductWriter
{
    protected $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[]   = $shopProduct;
    }

    abstract public function write();
}
