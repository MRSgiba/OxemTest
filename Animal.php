<?php

class Animal {
    
    public $uuid;
    
    //Идентификатор животного воспринимаем, как параметр принимаемый извне
    public function __construct($uuid) {
        $this->uuid = $uuid;
    }
    
    public function getProduct() {
        $result[$this::TYPE_PRODUCT] = mt_rand($this::MIN_PRODUCT,$this::MAX_PRODUCT);
        return $result;
    }
    
            
}
