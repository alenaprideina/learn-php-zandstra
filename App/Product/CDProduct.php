<?php


namespace App\Product;


class CDProduct extends ShopProduct
{
    private $playLength;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $playLength
    )
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength   = $playLength;
    }

    function getPlayLength()
    {
        return $this->playLength;
    }

    function getSummaryLine()
    {
        return parent::getSummaryLine() . " Время звучания: {$this->getPlayLength()}";
    }
}
