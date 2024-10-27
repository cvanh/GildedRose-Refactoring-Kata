<?php

declare(strict_types=1);

namespace Tests\Items;

use GildedRose\Items\Ticket;
use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase
{
    public function testTicketQualityIncreasesSuccess(): void
    {
        $item = new Ticket('Backstage passes to a TAFKAL80ETC concert', 14, 13);

        $item->update();

        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $item->name);
        $this->assertSame(14, $item->quality);
        $this->assertSame(13, $item->sellIn);
    }

    public function testTicketQualityIncreasesFails(): void
    {
        $item = new Ticket('Backstage passes to a TAFKAL80ETC concert', 15, 20);

        $item->update();

        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $item->name);
        $this->assertSame(21, $item->quality);
        $this->assertSame(14, $item->sellIn);
    }

    public function testTicketFastIncrease(): void
    {
        $item = new Ticket('Backstage passes to a TAFKAL80ETC concert', 8, 20);

        $item->update();

        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $item->name);
        $this->assertSame(22, $item->quality);
        $this->assertSame(7, $item->sellIn);
    }
}
