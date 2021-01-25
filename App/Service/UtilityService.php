<?php


namespace App\Service;

use App\PriceUtilities;

class UtilityService extends Service
{
    use PriceUtilities {
        PriceUtilities::calculateTax as private;
    }

    private $price;

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    public function getTaxRate(): float
    {
        return 17;
    }

    public function getFinalPrice(): float
    {
        return ($this->price + $this->calculateTax($this->price));
    }
}
