<?php


namespace App\Product;


class ShopProductWriter
{
    private $products    = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[]   = $shopProduct;
    }

    public function write()
    {
        foreach ($this->products as $shopProduct) {
            print($shopProduct->getSummaryLine() . "\n");
        }
    }
}