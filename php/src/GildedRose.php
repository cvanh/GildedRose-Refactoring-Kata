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

            //     if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
            //         if ($item->quality > 0) {
            //             if ($item->name != 'Sulfuras, Hand of Ragnaros') {
            //                 $item->quality = $item->quality - 1;
            //             }
            //         }
            //     } else {
            //         if ($item->quality < 50) {
            //             $item->quality = $item->quality + 1;
            //             if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
            //                 // increase the sellin by 2 when quality is between 6-10
            //                 if ($item->sellIn < 11 || $item->sellIn < 6) {
            //                     if ($item->quality < 50) {
            //                         $item->quality = $item->quality + 1;
            //                     }
            //             }
            //         }
            //     }

            //     if ($item->name != 'Sulfuras, Hand of Ragnaros') {
            //         $item->sellIn = $item->sellIn - 1;
            //     }

            //     if ($item->sellIn < 0) {
            //         if ($item->name != 'Aged Brie') {
            //             if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
            //                 if ($item->quality > 0) {
            //                     if ($item->name != 'Sulfuras, Hand of Ragnaros') {
            //                         $item->quality = $item->quality - 1;
            //                     }
            //                 }
            //             } else {
            //                 $item->quality = $item->quality - $item->quality;
            //             }
            //         } else {
            //             if ($item->quality < 50) {
            //                 $item->quality = $item->quality + 1;
            //             }
            //         }
            //     }
            // }
        }
    }
}
