# Fcollector
Запуск приложения Fcollector осуществляется из директории src при помощи команды "php main.php".
В классе FruitCollector реализованы следующие методы: 

1) Конструктор класса __construct(string $newdbName,string $newtableName,string $servername,string $username,string $password) - с следующими аргументами: 
Название новой БД для хранения таблицы - $newdbName, название новой таблицы - $newtableName, название активного MySQL сервера - $servername, логин для подключения к 
активному серверу MySQL - $username, пароль для подключения к активному серверу MySQL - $password.

2) Метод класса setTrees(int $amountApple, int $amountPear) добавляющий изначальное количество деревьев в сад, с следующими аргументами: 
количество изначально добавляемых яблонь - $amountApple, количество изначально добавляемых груш - $amountPear.    

3) Метод класса addTrees(int $amountApple, int $amountPear) добавляющий дополнительные деревья в сад, с следующими аргументами: 
количество добавляемых яблонь - $amountApple, количество добавляемых груш - $amountPear.    
 
4) Метод класса getFruits() производящий сбор и подсчет количества фруктов со всех имеющихся деревьев.

Unit - тестирование классов приложения производится при помощи фреймворка PHPUnit.
Для unit - тестирования разработаны следующие классы: 
DataBaseWorkTest, FruitCollectorTest.
Запуск тестирования осуществляется из корневого каталога при помощи команды ".\vendor\bin\phpunit Test/"
