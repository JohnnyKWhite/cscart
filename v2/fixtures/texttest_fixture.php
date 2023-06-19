<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Shop;
use App\Item;

$items = array(
    Item::init('Dexterity vest', 10, 20),
    Item::init('Blue cheese', 2, 0),
    Item::init('Healing potion', 5, 7),
    Item::init('Mjolnir', 0, 80),
    Item::init('Mjolnir', -1, 80),
    Item::init('Concert tickets', 15, 20),
    Item::init('Concert tickets', 10, 49),
    Item::init('Concert tickets', 5, 49),
    Item::init('Magic cake', 3, 9),
    Item::init('Magic cake', 6, 5)
);

$app = new Shop($items);

$days = 2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}

for ($i = 0; $i < $days; $i++) {
    echo("-------- day $i --------" . PHP_EOL);
    echo("name, sellIn, quality" . PHP_EOL);
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->updateQuality();
}
