<?php

declare(strict_types=1);

namespace GildedRose;

class GameItem extends Item
{
    public string $name;

    public int $sellIn;

    public int $quality;

    public function update()
    {
    }

    // if quality is between 0-50 it can be increased
    public function canQualityBeIncreased()
    {
        return $this->quality < 50 && $this->quality > -1;
    }

    // increase quality defaults to 1
    public function incrementQuality($increase = 1)
    {
        $this->quality = $this->quality + $increase;
    }

    public function isSellNegative()
    {
        return (bool) $this->sellIn < 0;
    }
}
