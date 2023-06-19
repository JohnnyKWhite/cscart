<?php

declare(strict_types=1);

namespace App\Items;

use App\Item;

class BlueCheese extends Item {
    public function updateQuality() {
        $this->quality = $this->checkSellIn() ? $this->quality + 1 : $this->quality + 2;

        return parent::updateQuality();
    }
}