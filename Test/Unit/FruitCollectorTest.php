<?php
namespace Test\Unit;

use FruitCollector;
use PHPUnit\Framework\TestCase;


class FruitCollectorTest extends TestCase
{


    public function testAttributeServername(): void
    {
      $this->assertClassNotHasAttribute('servername','FruitCollector');
    }

    public function testAttributeUsername(): void
    {
      $this->assertClassNotHasAttribute('username','FruitCollector');
    }

    public function testAttributePassword(): void
    {
      $this->assertClassNotHasAttribute('password','FruitCollector');
    }
    public function testAttributeConn(): void
    {
      $this->assertClassHasAttribute('dbconn','FruitCollector');
    }

    public function testAttributeTableName(): void
    {
      $this->assertClassHasAttribute('tableName','FruitCollector');
    }
    public function testAttributedbName(): void
    {
      $this->assertClassHasAttribute('dbName','FruitCollector');
    }

    public function testSetTreesmethod(): void
    {
      $retval;
      $object=new FruitCollector("un_test1","dsf","localhost","root","");
      $retval=$object->SetTrees(5,15);
      $this->assertIsArray($retval);
    }

    public function testAddTreesmethod(): void
    {
      $retval;
      $object=new FruitCollector("un_test1","dsf","localhost","root","");
      $retval=$object->addTrees(5,15);
      $this->assertIsArray($retval);
    }

    public function testGetFruitsmethod(): void
    {
      $retval;
      $object=new FruitCollector("un_test1","dsf","localhost","root","");
      $retval=$object->getFruits();
      $this->assertIsInt($retval);
    }
}

?>
