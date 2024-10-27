<?php

declare(strict_types=1);

namespace Tests\Items;

use GildedRose\Items\Brie;
use PHPUnit\Framework\TestCase;

class BrieTest extends TestCase
{
    public function testBrieQualityIncrease(): void
    {
        $item = new Brie('Aged Brie', 0, 0);

        $item->update();

        $this->assertSame('Aged Brie', $item->name);
        $this->assertSame(2, $item->quality);
    }

    public function testBrieQualityLimit(): void
    {
        $item = new Brie('Aged Brie', 0, 50);

        $item->update();

        $this->assertSame('Aged Brie', $item->name);
        $this->assertSame(50, $item->quality);
    }
}
