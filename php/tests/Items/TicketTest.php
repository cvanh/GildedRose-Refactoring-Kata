<?php

declare(strict_types=1);

namespace Tests\Items;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase
{
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
