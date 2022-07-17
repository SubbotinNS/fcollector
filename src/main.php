<?php

require_once 'FruitCollector.php';

$fcollector = new FruitCollector('TreesDB','gardens','localhost','root','');
$fcollector->setTrees(10,15);
//$fcollector->addTrees(3,13);       Добавление деревьев
$fcollector->getFruits();

 ?>
