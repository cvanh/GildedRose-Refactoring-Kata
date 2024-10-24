<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    
    public function testSingle(): void
    {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo', $items[0]->name);
    }

    // brie
    public function testBrieQualityIncrease(): void
    {
        $items = [new Item('Aged Brie', 0, 0)];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertSame('Aged Brie', $items[0]->name);
        $this->assertSame(2, $items[0]->quality);

    }

    public function testBrieQualityLimit(): void
    {
        $items = [new Item('Aged Brie', 0, 50)];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertSame('Aged Brie', $items[0]->name);
        $this->assertSame(50, $items[0]->quality);

    }

    // sulferas

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

    // ticket
    public function testTicketQualityIncreasesSuccess(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 14, 13)];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(14, $items[0]->quality);
        $this->assertSame(13, $items[0]->sellIn);

    }

    public function testTicketQualityIncreasesFails(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20)];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(21, $items[0]->quality);
        $this->assertSame(14, $items[0]->sellIn);
    }

    public function testTicketFastIncrease(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 8, 20)];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(22, $items[0]->quality);
        $this->assertSame(7, $items[0]->sellIn);
    }
}
