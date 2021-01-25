<?php


namespace App;

trait PriceUtilities
{
    public function calculateTax(float $price): float
    {
        return (($this->getTaxRate() / 100) * $price);
    }

    abstract public function getTaxRate(): float;
}
