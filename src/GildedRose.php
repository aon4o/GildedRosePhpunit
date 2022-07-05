<?php

namespace App;

class GildedRose
{
    public string $name;
    public int $quality;
    public int $sellIn;

    /**
     * @param string $name
     * @param int $quality
     * @param int $sellIn
     */
    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    /**
     * @param string $name
     * @param int $quality
     * @param int $sellIn
     * @return Item
     */
    public static function of(string $name, int $quality, int $sellIn): Item
    {
        $item_types = [
            'normal' => Item::class,
            'Aged Brie' => AgedBrie::class,
            'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
            'Backstage passes to a TAFKAL80ETC concert' => BackstagePass::class,
            'Conjured Mana Cake' => ConjuredManaCake::class,
        ];

        return new $item_types[$name]($quality, $sellIn);
    }
}
