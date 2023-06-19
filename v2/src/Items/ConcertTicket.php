<?php

declare(strict_types=1);

namespace App\Items;

use App\Item;

class ConcertTicket extends Item {
    public function updateQuality() {
        if ($this->sell_in > 10) {
            $this->quality = $this->quality + 1;
        } elseif ($this->sell_in > 5) {
            $this->quality = $this->quality + 2;
        } elseif ($this->sell_in > 0) {
            $this->quality = $this->quality + 3;
        } else {
            $this->quality = 0;
        }

        return parent::updateQuality();
    }
}