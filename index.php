<?php
require __DIR__ . '/vendor/autoload.php';

use App\Service\UtilityService;
use Faker\Factory as FakerFactory;
use App\Product\ShopProduct;
use App\Writer\TextProductWriter;

$faker = FakerFactory::create('ru_RU');

// Пример создания объекта
$product = new ShopProduct(
    'Пример создания объекта через конструктор',
    $faker->firstName(),
    $faker->lastName,
    $faker->numberBetween(100, 1000)
);

// пример создания объекта по классу, который расширяет абстрактный класс
$writer = new TextProductWriter();
$writer->addProduct($product);

$db_name = 'db.sqlite';
$dsn = "sqlite:/" . __DIR__ . "/$db_name";
$pdo = new \PDO($dsn, null, null);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(1, $pdo);

$writer->addProduct($obj);
$writer->write();

// пример использования трейтов
print $product->calculateTax(150) . "\n";
print $product->generateId() . "\n";

$ut1 = new UtilityService();
print $ut1::calculateTax(100) . "\n";
