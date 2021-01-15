<?php


namespace App;

trait PriceUtilities
{
    private $tax_rate = 17;

    public function calculateTax(float $price): float
    {
        return (($this->tax_rate / 100) * $price);
    }
}
