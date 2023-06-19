<?php

declare(strict_types=1);

namespace App\Items;

use App\Item;

class MagicCake extends Item {
    public function updateQuality() {
        $this->quality = $this->quality - 2;
        
        return parent::updateQuality();
    }
}