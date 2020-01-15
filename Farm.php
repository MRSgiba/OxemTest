<?php

include 'Cow.php';
include 'Chicken.php';

class Farm {
    public $animals = [];
    private $products = [];
    private $infoProducts = [];
    private $permittedAnimals = ['Cow','Chicken'];


    public function addAnimal($className,$uuid) {
        if (!in_array($className, $this->permittedAnimals)) {
            return false;
        }
        $animal = new $className($uuid);
        $this->infoProducts[$className::TYPE_PRODUCT] = [$className::NAME_PRODUCT,$className::NAME_UNIT];
        return $animal;
    }
    
    public function getProducts() {
        $animals = $this->animals;
        foreach ($animals as $a) {
            $this->products[$a->uuid] = $a->getProduct();
        }
        return $this->products;
    }
    
    public function showResult() {
        $products = $this->products;
        $result = array_fill_keys(array_keys($this->infoProducts),0);
        foreach ($products as $p) {
            //В 7.3 можно было бы использовать array_key_first()
            $name = array_keys($p)[0];
            $result[$name] += array_sum($p);
        }
        $msg = 'На ферме собрано: ';
        foreach ($result as $k=>$v) {
            $msg.= $this->infoProducts[$k][0].' - '.$v.' '.$this->infoProducts[$k][1].'; ';
        }
        return $msg;
    }  
            
}
