<?php


namespace App\Product;


abstract class ShopProductWriter
{
    protected $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[]   = $shopProduct;
    }

    abstract public function write();
}
