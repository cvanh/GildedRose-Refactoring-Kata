<?php

declare(strict_types=1);

namespace GildedRose\Items;

use GildedRose\GameItem;

class Conjured extends GameItem
{
    public function update(): void
    {
        parent::update();

        // decrement quality by 1 do it twice so it is not a negative number
        if ($this->canQualityBeIncreased()) {
            $this->quality = $this->quality - 1;

            if (!$this->isQualityNegative()) {
                $this->quality = $this->quality - 1;
            }

            // decrease quality by 4 when sellin is negative
            if ($this->isSellNegative()) {
                for ($i = 0; $i < 2; $i++) {
                    if (!$this->isQualityNegative()) {
                        $this->quality = $this->quality - 1;
                    }
                }
            }
        }
        $this->sellIn = $this->sellIn - 1;
    }
}