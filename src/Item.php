<?php

namespace App;

class Item
{
    public int $quality;
    public int $sellIn;

    /**
     * @param int $quality
     * @param int $sellIn
     */
    public function __construct(int $quality, int $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    /**
     * @return void
     */
    public function tick(): void
    {
        $this->decreaseSellIn();

        if ($this->hasMinQualityOrLower()) {
            return;
        }

        $this->decreaseQuality();

        if ($this->isSellInBelowOrEquals(0)) {
            $this->decreaseQuality();
        }
    }


    /**
     * @return bool
     */
    protected function hasMaxQualityOrMore(): bool
    {
        return $this->quality >= 50;
    }

    /**
     * @return bool
     */
    protected function hasMinQualityOrLower(): bool
    {
        return $this->quality <= 0;
    }

    /**
     * @return void
     */
    protected function increaseQuality(): void
    {
        $this->quality++;
    }

    /**
     * @param int $number
     * @return void
     */
    protected function decreaseQuality(int $number = 1): void
    {
        $this->quality -= $number;
    }

    /**
     * @return void
     */
    public function decreaseSellIn(): void
    {
        $this->sellIn = $this->sellIn - 1;
    }

    /**
     * @param int $number
     * @return bool
     */
    public function isSellInBelowOrEquals(int $number): bool
    {
        return $this->sellIn <= $number;
    }

    /**
     * @param int $number
     * @return void
     */
    public function setQuality(int $number): void
    {
        $this->quality = $number;
    }
}