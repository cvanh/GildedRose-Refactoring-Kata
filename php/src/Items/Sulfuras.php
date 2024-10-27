<?php

declare(strict_types=1);

namespace GildedRose\Items;

use GildedRose\GameItem;

class Sulfuras extends GameItem
{
    public function update() {
        parent::update();

        // this item doesnt do jack
        return $this;
    }
}
