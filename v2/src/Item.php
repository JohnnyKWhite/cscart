<?php

declare(strict_types=1);

namespace App;

use App\Items\General;
use App\Items\Mjolnir;
use App\Items\BlueCheese;
use App\Items\ConcertTicket;
use App\Items\MagicCake;

abstract class Item
{

    const BLUE_CHEESE = 'Blue cheese';
    const CONCERT_TICKET = 'Concert tickets';
    const MJOLNIR = 'Mjolnir';
    const MAGIC_CAKE = 'Magic cake';

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $sell_in;

    /**
     * @var int
     */
    public $quality;

    public function init(string $name, int $sell_in, int $quality) {
        switch ($name) {
            case self::MJOLNIR:
                $item = new Mjolnir;
                break;
            case self::BLUE_CHEESE:
                $item = new BlueCheese;
                break;
            case self::CONCERT_TICKET:
                $item = new ConcertTicket;
                break;
            case self::MAGIC_CAKE:
                $item = new MagicCake;
                break;
            default:
                $item = new General;
        }

        $item->name = $name;
        $item->sell_in = $sell_in;
        $item->quality = $quality;

        return $item;
    }

    public function updateQuality() {
        $this->quality > 50 && $this->quality = 50;
        $this->quality < 0 && $this->quality = 0;

        $this->sell_in--;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    protected function checkSellIn(): bool {
        return $this->sell_in > 0;
    }
}
