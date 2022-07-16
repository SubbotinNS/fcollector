<?php

include "FruitCollector.php";

$fcollector = new FruitCollector('TreesDB','gardens','localhost','root','');
$fcollector->setTrees(10,15);
$fcollector->addTrees(3,13);
$fcollector->addTrees(25,4);
$fcollector->getFruits();

 ?>
