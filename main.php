<?php

include 'Farm.php';
const COUNT_COW=10;
const COUNT_CHICKEN=20;

//Метод для добавления животного сделан публичным, при добавление на ферму животного класса Anima возвращается false, который мы обрабатываем
function fillAnimals($farm,$className,$count) {
    $i = 0;
    while ($i<$count) {
        $uuid = str_replace('.','',uniqid('',true));
        $animal = $farm->addAnimal($className,$uuid);
        if (!$animal) {
            echo 'Вы пытаетесь развести животное не определенного класса '.$className;
            exit;
        }
        if (!array_key_exists($uuid, $farm->animals)) {
            $farm->animals[$uuid] = $animal;
            $i++;
        }
    }    
}

$farm = new Farm;
fillAnimals($farm,'Cow',COUNT_COW);
fillAnimals($farm,'Chicken',COUNT_CHICKEN);
//fillAnimals($farm,'Anima',COUNT_CHICKEN);
$farm->getProducts();
echo $farm->showResult();