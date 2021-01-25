<?php


namespace App\Product;

use App\Chargeable;
use App\IdentityTrait;
use App\PriceUtilities;

class ShopProduct implements Chargeable
{
    use PriceUtilities, IdentityTrait;

    private $id;
    private $title;
    private $producerMainName;
    private $producerFirstName;
    protected $price;

    private $discount    = 0;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price
    ) {
        $this->title    = $title;
        $this->producerFirstName    = $firstName;
        $this->producerMainName     = $mainName;
        $this->price    = $price;
    }

    public function setID(int $id)
    {
        $this->id = $id;
    }

    public static function getInstance(int $id, \PDO $pdo): ShopProduct
    {
        $stmt = $pdo->prepare('SELECT * FROM products WHERE id=?');
        $result = $stmt->execute([$id]);
        $row =$stmt->fetch();

        if (empty($row)) {
            return null;
        }

        if ($row['type'] == 'book') {
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float) $row['price'],
                (int) $row['numpages']
            );
        } elseif ($row['type'] == 'cd') {
            $product = new CDProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float)$row['price'],
                (int)$row['playlength']
            );
        } else {
            $firstname = $row['firstname'] ?? '';
            $product = new ShopProduct(
                $row['title'],
                $firstname,
                $row['mainname'],
                (float)$row['price']
            );
        }

        $product->setID((int)$row['id']);
        $product->setDiscount((int)$row['discount']);
        return $product;
    }

    public function getProducerFirstName()
    {
        return $this->producerFirstName;
    }

    public function getProducerMainName()
    {
        return $this->producerMainName;
    }

    public function getProducer()
    {
        return $this->producerFirstName . ' ' . $this->producerMainName;
    }

    public function getSummaryLine()
    {
        return "Название: {$this->title}. Автор: {$this->getProducer()}.";
    }

    public function setDiscount(int $num)
    {
        $this->discount = $num;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getPrice(): float
    {
        return $this->price - $this->discount;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getTaxRate(): float
    {
        return 17;
    }
}
