<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Items\Brie;
use GildedRose\Items\Sulfuras;
use GildedRose\Items\Ticket;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array &$items
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $key => $item) {
            switch ($item->name) {
                case 'Aged Brie':
                    $brie = new Brie($item->name, $item->sellIn, $item->quality);
                    $brie->update();
                    $this->items[$key] = $brie;
                    break;

                case 'Backstage passes to a TAFKAL80ETC concert':
                    $ticket = new Ticket($item->name, $item->sellIn, $item->quality);
                    $ticket->update();
                    $this->items[$key] = $ticket;
                    break;

                case 'Sulfuras, Hand of Ragnaros':
                    $sulfuras = new Sulfuras($item->name, $item->sellIn, $item->quality);
                    $sulfuras->update();
                    $this->items[$key] = $sulfuras;
                    break;

                default:
                    break;
            }
        }
    }
}