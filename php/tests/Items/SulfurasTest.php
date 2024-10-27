<?php

declare(strict_types=1);

namespace Tests\Items;

use GildedRose\Items\Sulfuras;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testSulfurasQualityChange(): void
    {
        $item = new Sulfuras('Sulfuras, Hand of Ragnaros', 0, 0);

        $item->update();

        $this->assertSame('Sulfuras, Hand of Ragnaros', $item->name);
        $this->assertSame(0, $item->quality);
    }

    public function testSulfurasSellInChange(): void
    {
        $item = new Sulfuras('Sulfuras, Hand of Ragnaros', 0, 0);

        $item->update();

        $this->assertSame('Sulfuras, Hand of Ragnaros', $item->name);
        $this->assertSame(0, $item->sellIn);
    }
}
