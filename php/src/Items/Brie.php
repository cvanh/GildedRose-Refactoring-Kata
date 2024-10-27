<?php

declare(strict_types=1);

namespace GildedRose\Items;

use GildedRose\GameItem;

class Brie extends GameItem
{
    /**
     * update item
     */
    public function update(): void
    {
        parent::update();

        if ($this->canQualityBeIncreased()) {
            $this->incrementQuality(2);
        }
    }
}
