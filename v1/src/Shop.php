<?php

declare(strict_types=1);

namespace Shop;

final class Shop
{

    const BLUE_CHEESE = 'Blue cheese';
    const CONCERT_TICKET = 'Concert tickets';
    const MJOLNIR = 'Mjolnir';
    const MAGIC_CAKE = 'Magic cake';


    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case self::MJOLNIR:
                    continue 2;
                case self::BLUE_CHEESE:
                    $item->quality = self::updateQualityBlueCheese($item);
                    break;
                case self::CONCERT_TICKET:
                    $item->quality = self::updateQualityConcertTicket($item);
                    break;
                case self::MAGIC_CAKE:
                    $item->quality = self::updateQualityMagicCake($item);
                    break;
                default:
                    $item->sell_in < 1 && $item->quality--;
                    $item->quality--;
            }

            $item->quality > 50 && $item->quality = 50;
            $item->quality < 0 && $item->quality = 0;

            $item->sell_in--;
        }
    }

    private function updateQualityBlueCheese($item): int {
        return $item->sell_in < 1 ? $item->quality + 2 : ++$item->quality;
    }

    private function updateQualityConcertTicket($item): int {
        if ($item->sell_in > 10) {
            return $item->quality + 1;
        } elseif ($item->sell_in > 5) {
            return $item->quality + 2;
        } elseif ($item->sell_in > 0) {
            return $item->quality + 3;
        }

        return 0;
    }

    private function updateQualityMagicCake($item): int {
        return $item->quality - 2;
    }
}
