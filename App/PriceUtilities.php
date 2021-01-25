<?php


namespace App;

trait PriceUtilities
{
    private static $tax_rate = 17;

    public static function calculateTax(float $price): float
    {
        return ((self::$tax_rate / 100) * $price);
    }
}
