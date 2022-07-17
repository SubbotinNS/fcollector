<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class DatabaseWork extends TestCase
{
  public function testPower($a, $b, $c)
    {
        $my = new DatabaseWork();
        $this->assertEquals($c, $my->power($a, $b));
    }
}
