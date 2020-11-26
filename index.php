<?php
require __DIR__ . '/vendor/autoload.php';

use Faker\Factory as FakerFactory;
use App\Product\ShopProductWriter;
use App\Product\ShopProduct;

$faker = FakerFactory::create('ru_RU');

$writer = new ShopProductWriter();
$product = new ShopProduct(
    'Заголовок',
    $faker->firstName(),
    $faker->lastName,
    $faker->numberBetween(100, 1000)
);

$writer->addProduct($product);

$db_name = 'db.sqlite';
//$db_name = 'products.db';

//$db = new SQLite3($db_name);
//$db->exec('
//    CREATE TABLE IF NOT EXISTS products (
//        id INTEGER PRIMARY KEY AUTOINCREMENT,
//        type TEXT,
//        firstname TEXT,
//        mainname TEXT,
//        title TEXT,
//        price FLOAT,
//        numpages INT,
//        playlength INT,
//        discount INT
//    )
//');

$dsn = "sqlite:/" . __DIR__ . "/$db_name";
$pdo = new \PDO($dsn, null, null);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(1, $pdo);

$writer->addProduct($obj);
dump($writer);