<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GameItem;
use PHPUnit\Framework\TestCase;

class GameItemTest extends TestCase
{
    public function canIncreaseQualityIncreaseProvider(): array
    {
        return [
            [25, true],
            [0, true],
            [49, true],
            [50, false],
            [-1, false],
        ];
    }

    /**
     * @dataProvider canIncreaseQualityIncreaseProvider
     */
    public function testCanIncreaseQualityWhenValid(int $quality, bool $expected): void
    {
        $item = new GameItem('Aged Brie', 0, $quality);
        $this->assertSame($expected, $item->canQualityBeIncreased());
    }

    public function testIsSellNegativeWhenNegative(): void
    {
        $item = new GameItem('Aged Brie', -1, 0);
        $this->assertTrue($item->isSellNegative());
    }

    public function testIsSellNegativeWhenPositive(): void
    {
        $item = new GameItem('Aged Brie', 10, 0);
        $this->assertFalse($item->isSellNegative());
    }

    public function testIsQualityNegativeWhenNegative(): void
    {
        $item = new GameItem('Aged Brie', 0, -1);
        $this->assertFalse($item->isQualityNegative());
    }

    public function testIsQualityNegativeWhenPositive(): void
    {
        $item = new GameItem('Aged Brie', 0, 10);
        $this->assertFalse($item->isQualityNegative());
    }
}