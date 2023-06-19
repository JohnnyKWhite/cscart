<?php

declare(strict_types=1);

namespace App\Items;

use App\Item;

class General extends Item {
    public function updateQuality() {
        !$this->checkSellIn() && $this->quality--;
        $this->quality--;

        return parent::updateQuality();
    }
}