<?php


namespace App\Writer;


use App\Product\ShopProductWriter;

class TextProductWriter extends ShopProductWriter
{


    public function write()
    {
        $str = "ТОВАРЫ:\n";
        foreach ($this->products as $shopProduct) {
            $str .= $shopProduct->getSummaryLine() . "\n";
        }
        print $str;
    }
}