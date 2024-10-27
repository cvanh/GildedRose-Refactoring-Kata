<?php

declare(strict_types=1);

namespace Tests\Items;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testSulfurasQualityChange(): void
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 0)];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[0]->name);
        $this->assertSame(0, $items[0]->quality);
    }

    public function testSulfurasSellInChange(): void
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 0)];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[0]->name);
        $this->assertSame(0, $items[0]->quality);
    }
}
