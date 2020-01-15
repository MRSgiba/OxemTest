<?php

include 'Farm.php';

$farm = new Farm(10,20);
$farm->getProducts();
echo $farm->showResult();