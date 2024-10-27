<?php

declare(strict_types=1);

namespace GildedRose\Items;

use GildedRose\GameItem;

class Brie extends GameItem
{
    public function update() {
        parent::update();

        // xdebug_break();
        if($this->canQualityBeIncreased()){
            $this->incrementQuality(2);
        }

        return $this;
    }
}
