<?php

declare(strict_types=1);

namespace Tests\Items;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class BrieTest extends TestCase
{

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
}
