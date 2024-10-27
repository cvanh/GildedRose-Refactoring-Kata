<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testMultipleItems(): void
    {
        $items = [
            new Item('Backstage passes to a TAFKAL80ETC concert', 8, 20),
            new Item('Sulfuras, Hand of Ragnaros', 0, 0),
            new Item('Aged Brie', 0, 50),
        ];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[1]->name);
        $this->assertSame('Aged Brie', $items[2]->name);
    }
}
