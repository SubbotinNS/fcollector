<?php

include 'DatabaseWork.php';


class FruitCollector
{

  private $tableName;
  private $dbName;
  private $dbwork;
  private $dbconn;

  public function __construct(string $newdbName = 'TreesDB',string $newtableName = 'gardens',string $servername,string $username,string $password)
  {
    $this->dbName = $newdbName;
    $this->tableName = $newtableName;
    $this->dbwork = new DatabaseWork($this->tableName,$this->dbName,$servername,$username,$password);
    $this->dbwork->DatabaseInit();
    $this->dbconn=$this->dbwork->ReturnConn();
  }

  public function setTrees(int $amountApple, int $amountPear)
  {
    $arr_values;
    $i;
    $values_to_send;

    for($i=1;$i<$amountApple+$amountPear+1;$i++)
    {

      $arr_values[$i]="(".$i.",".($i<$amountApple+1?"'Apple'":"'Pear'").",".($i<$amountApple+1?rand(40,50):rand(0,20)).")\n";
    }

    $values_to_send=implode(",",$arr_values);
     $sql= "REPLACE INTO {$this->tableName} VALUES $values_to_send";
      $this->dbconn->exec($sql);
  }

  public function addTrees(int $amountApple, int $amountPear)
  {
    $arr_values;
    $i;
    $values_to_send;

    for($i=1;$i<$amountApple+$amountPear+1;$i++)
    {

      $arr_values[$i]="(".($i<$amountApple+1?"'Apple'":"'Pear'").",".($i<$amountApple+1?rand(40,50):rand(0,20)).")\n";
    }

    $values_to_send=implode(",",$arr_values);
     $sql= "INSERT INTO {$this->tableName} (type_tree,amount_of_fruits) VALUES $values_to_send";
      $this->dbconn->exec($sql);
  }

  public function getFruits()
  {
    $amountPear=0;
    $amountApple=0;
    $weightApple=0;
    $weightPear=0;
    $pdoS;

    $sql = "SELECT * FROM {$this->tableName} WHERE type_tree = ?;";
    $pdoS=$this->dbconn->prepare($sql);
    $pdoS->execute(['Apple']);
    $result=$pdoS->fetchAll();
    foreach ($result as $key => $value) {
      $amountApple += $value['amount_of_fruits'];
    }
    echo "Amount of Apples = " . $amountApple . "\n";

    for ($i=0;$i<$amountApple;$i++)                                       // Подсчет веса реализовал без добавления доп полей в БД
      $weightApple += rand(150,180);
    echo "Weight of Apples =" . $weightApple/1000 . "kg\n";

    $pdoS->execute(['Pear']);
    $result=$pdoS->fetchAll();

    foreach ($result as $key => $value) {
      $amountPear += $value['amount_of_fruits'];
    }

    echo "Amount of Pear = " . $amountPear . "\n";

    for ($i=0;$i<$amountPear;$i++)                                      // Подсчет веса реализовал без добавления доп полей в БД
      $weightPear += rand(130,170);
    echo "Weight of Pear =" . $weightPear/1000 . "kg\n";
  }

}

?>
