<?php

include 'Cow.php';
include 'Chicken.php';

class Farm {
    private $animals = [];
    private $products = [];
    private $infoProducts = [];
    
    public function __construct($countCow = 0,$countChicken = 0) {
        $this->addAnimals('Cow',$countCow);
        $this->addAnimals('Chicken',$countChicken);
    }

    private function addAnimals($className, $count) {
        $shift = count($this->animals);
        while (count($this->animals)<$count+$shift) {
            $animal = new $className;
            if (!array_key_exists($animal->uuid, $this->animals)) {
                $this->animals[$animal->uuid] = $animal;
            }
        }
        $this->infoProducts[$className::TYPE_PRODUCT] = [$className::NAME_PRODUCT,$className::NAME_UNIT];
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
