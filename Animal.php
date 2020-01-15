<?php

class Animal {
    
    public $uuid;
    
    public function __construct() {
        $this->uuid = str_replace('.','',uniqid('',true));
    }
    
    public function getProduct() {
        $result[$this::TYPE_PRODUCT] = mt_rand($this::MIN_PRODUCT,$this::MAX_PRODUCT);
        return $result;
    }
    
            
}
