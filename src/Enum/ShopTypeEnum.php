<?php

namespace App\Enum;

class ShopTypeEnum {

    const BOUCHERIE_CHARCUTERIE = 'BOUCHERIE_CHARCUTERIE';
    const BOULANGERIE = 'BOULANGERIE';
    const CAFE_BAR_TABAC = 'CAFE_BAR_TABAC';
    const COIFFEUR = 'COIFFEUR';
    const EPICERIE = 'EPICERIE';
    const FLEURISTE = 'FLEURISTE';
    const LIBRAIRIE_PRESS = 'LIBRAIRIE_PRESS';
    const PHARMACIE = 'PHARMACIE';
    const RESTAURANT = 'RESTAURANT';
    const AUTRE = 'AUTRE';

    const SHOP_TYPES = [
        self::BOUCHERIE_CHARCUTERIE => [
            'slug'=>'boucherie-charcuterie',
            'label' => 'Boucherie/Charcuterie'
        ],
    ];

    public static function getShopChoicesType() {
        return [
            self::SHOP_TYPES[self::BOUCHERIE_CHARCUTERIE]['label'] => self::SHOP_TYPES[self::BOUCHERIE_CHARCUTERIE]['slug']
        ];
    }
}