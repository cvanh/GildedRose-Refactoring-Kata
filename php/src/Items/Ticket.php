<?php

declare(strict_types=1);

namespace GildedRose\Items;

use GildedRose\GameItem;

class Ticket extends GameItem
{
    public function update()
    {
        parent::update();

        if ($this->isSellNegative()) {
            $this->quality = 0;
            return;
        }

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

        return $this;
    }
}
