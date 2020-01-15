<?php

include_once 'Animal.php';

class Chicken extends Animal {

    const MIN_PRODUCT = 0;
    const MAX_PRODUCT = 1;
    const TYPE_PRODUCT = 'Egg';
    const NAME_PRODUCT = 'Яйцо';
    const NAME_UNIT = 'шт.'; 

    //животное планирует отдавать продукцию не по логике rand(min,max)
    public function getProduct() {
        $result[$this::TYPE_PRODUCT] = mt_rand($this::MIN_PRODUCT,$this::MAX_PRODUCT)*mt_rand($this::MIN_PRODUCT,$this::MAX_PRODUCT);
        return $result;
    }
    
}
