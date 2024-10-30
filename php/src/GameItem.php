<?php

declare(strict_types=1);

namespace GildedRose;

class GameItem extends Item
{
    public string $name;
    public int $sellIn;
    public int $quality;

    public function update(): void
    {
    }

    /**
     * check if quality is between 0-50
     *
     * @return boolean
     */
    public function canQualityBeIncreased(): bool
    {
        return $this->quality < 50 && $this->quality > -1;
    }

    // increase quality defaults to 1
    /**
     * increase quality
     *
     * @param integer $increase | Defaults: 1
     */
    public function incrementQuality(int $increase = 1): void
    {
        $this->quality = $this->quality + $increase;
    }

    /**
     * check if sellIn is negative
     *
     * @return boolean
     */
    public function isSellNegative(): bool
    {
        return $this->sellIn < 0;
    }

    /**
     * check if quality is negative
     * @todo should use constant for min 
     * @return boolean
     */
    public function isQualityNegative(): bool
    {
        return (bool) $this->quality < -1;
    }

    /**
     * check if quality is between 0-50
     *
     * @return boolean
     */
    public function canSellInBeIncreased(): bool
    {
        return $this->sellIn < 50 && $this->sellIn > -1;
    }

    // TODO add methods for manipulating values
}