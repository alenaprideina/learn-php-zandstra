<?php


namespace App\Product;

class BookProduct extends ShopProduct
{
    private $numPages;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPages
    )
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages   = $numPages;
    }

    public function getNumberOfPages()
    {
        return $this->numPages;
    }

    public function getSummaryLine()
    {
        return parent::getSummaryLine() . " Количество страниц: {$this->getNumberOfPages()}";
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}