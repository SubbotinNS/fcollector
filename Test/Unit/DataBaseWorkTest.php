<?php
namespace Test\Unit;

use DatabaseWork;
use PHPUnit\Framework\TestCase;


class DataBaseWorkTest extends TestCase
{


    public function testAttributeServername(): void
    {
      $this->assertClassHasAttribute('servername','DatabaseWork');
    }

    public function testAttributeUsername(): void
    {
      $this->assertClassHasAttribute('username','DatabaseWork');
    }

    public function testAttributePassword(): void
    {
      $this->assertClassHasAttribute('password','DatabaseWork');
    }
    public function testAttributeConn(): void
    {
      $this->assertClassHasAttribute('conn','DatabaseWork');
    }

    public function testAttributeTableName(): void
    {
      $this->assertClassHasAttribute('tableName','DatabaseWork');
    }
    public function testAttributedbName(): void
    {
      $this->assertClassHasAttribute('dbName','DatabaseWork');
    }

    public function testDatabaseInitmethod()
    {
      $object=new DatabaseWork("un_test1","dsf","localhost","root","");
      $object->DatabaseInit();
      $this->assertInstanceOf(DatabaseWork::class,$object);

    }

    public function testReturnConnmethod()
    {
      $object=new DatabaseWork("un_test2","dsf","localhost","root","");
      $object->ReturnConn();
      $this->assertNotEmpty($object);
    }
}

?>
