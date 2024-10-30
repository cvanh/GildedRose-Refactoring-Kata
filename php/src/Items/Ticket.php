<?php

declare(strict_types=1);

namespace GildedRose\Items;

use GildedRose\GameItem;

class Ticket extends GameItem
{
    /**
     * update item
     */
    public function update(): void
    {
        parent::update();

        if ($this->isSellNegative()) {
            $this->quality = 0;
            return;
        }

        // increase quality by 1 when sellin is lower then 10
        if ($this->sellIn > 11 && $this->canQualityBeIncreased()) {
            $this->incrementQuality();
            $this->sellIn = $this->sellIn - 1;
        }

        // increase quality by 2 when sellin is between 6-10
        if (($this->sellIn < 6 | $this->sellIn < 11) &&
            $this->canQualityBeIncreased()
        ) {
            $this->incrementQuality(2);
            $this->sellIn = $this->sellIn - 1;
        }
    }
}