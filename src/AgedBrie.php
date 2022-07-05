<?php

namespace App;

class AgedBrie extends Item
{
    /**
     * @return void
     */
    public function tick(): void
    {
        $this->decreaseSellIn();

        if ($this->hasMaxQualityOrMore()) {
            return;
        }

        $this->increaseQuality();

        if ($this->isSellInBelowOrEquals(0) && !$this->hasMaxQualityOrMore()) {
            $this->increaseQuality();
        }
    }
}