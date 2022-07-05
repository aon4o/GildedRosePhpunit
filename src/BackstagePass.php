<?php

namespace App;

class BackstagePass extends Item
{
    /**
     * @return void
     */
    public function tick(): void
    {
        if (!$this->isSellInBelowOrEquals(0)) {
            $this->increaseQuality();

            if ($this->isSellInBelowOrEquals(10)) {
                $this->increaseQuality();
            }

            if ($this->isSellInBelowOrEquals(5)) {
                $this->increaseQuality();
            }

            if ($this->hasMaxQualityOrMore()) {
                $this->setQuality(50);
            }
        } else {
            $this->setQuality(0);
        }

        $this->decreaseSellIn();
    }
}