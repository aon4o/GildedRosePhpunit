<?php

namespace App;

class ConjuredManaCake extends Item
{
    /**
     * @return void
     */
    public function tick(): void
    {
        $this->decreaseQuality(2);

        if ($this->isSellInBelowOrEquals(0)) {
            $this->decreaseQuality(2);
        }

        if ($this->hasMinQualityOrLower()) {
            $this->setQuality(0);
        }

        $this->decreaseSellIn();
    }
}