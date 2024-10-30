<?php

declare(strict_types=1);

namespace Tests\Items;

use GildedRose\Items\Conjured;
use PHPUnit\Framework\TestCase;

class ConjuredTest extends TestCase
{
    public function testQuality2Decrease(): void
    {
        $item = new Conjured('foo', 10, 4);

        $item->update();

        $this->assertSame($item->sellIn, 9);
        $this->assertSame($item->quality, 2);
    }

    public function testQuality4DecreaseAfterSellIn(): void
    {
        $item = new Conjured('foo', -2, 8);

        $item->update();

        $this->assertSame($item->sellIn, -3);
        $this->assertSame($item->quality, 4);
    }

    public function testQuality0Cap(): void
    {
        $item = new Conjured('foo', 0, 1);

        $item->update();

        $this->assertSame($item->quality, 0);
    }
}
