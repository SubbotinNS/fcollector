<?php

//          Создание БД и работа с ней будет вестись при помощи расширения  PDO

class DatabaseWork {

  private $servername;
  private $username;
  private $password;
  private $conn;
  private $tableName;
  private $dbName;

  public function __construct(string $nameTable,string $nameDB,string $newservername ="localhost" ,string $newusername="root",
  string $newpassword="")
  {

    $this->servername=$newservername;
    $this->username=$newusername;
    $this->password=$newpassword;
    $this->dbName = $nameDB;
    $this->tableName=$nameTable;
    $this->conn=new PDO("mysql:host=$this->servername;dbname=",$this->username,$this->password);        // Создание PDO объекта
    $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }

  public function ReturnConn ()
  {
    return $this->conn;
  }


  private function CreateDB()
  {
    try
    {
      $sql= "CREATE DATABASE {$this->dbName}";
      $this->conn->exec($sql);
      echo "Database {$this->dbName} created successfully\n";                   // Создание БД
      return 3;
    }
    catch(PDOException $e)
    {
      switch($e->getCode())
      {
      case "HY000":
      echo "Database {$this->dbName} already exists\n";
      return 0;
      break;

      default :
      echo $sql . "\n" . $e->getMessage();
      return 1;
      }
    }

  }


  private function CreateTable()
  {

    try
    {                                                           // Cоздание таблицы
      $sql = " USE {$this->dbName};
        CREATE TABLE {$this->tableName} (
        id_tree INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        type_tree ENUM('Apple','Pear'),
        amount_of_fruits INT(8)
      )";
      $this->conn->exec($sql);
      echo "Table {$this->tableName} created\n";
      return 3;
    }

    catch(PDOException $e)
    {
      switch($e->getCode())
      {
      case "42S01":
      echo "Table {$this->tableName} already exists\n";
      return 0;
      break;

      default :
      echo $sql . "\n" . $e->getMessage();
      return 1;
      }
    }
  }

  private function DropTable()
  {
                                                            // Удаление таблицы
    try
    {
      $sql="DROP TABLE {$this->tableName}";
      $this->conn->exec($sql);
      echo "Table {$this->tableName} deleted\n";
      return 3;
    }

    catch(PDOException $e)
    {
      echo $sql . "\n" . $e->getMessage();
      return 1;
    }
  }

  public function DatabaseInit()
  {
    $createDBStatus;                                // Инициализация БД и таблицы
    $createTableStatus;

    $createDBStatus=$this->CreateDB();

    if(!$createDBStatus)
      if(!$createTableStatus=$this->CreateTable())
          switch ($createTableStatus)
          {
            case 0:
            try{
            echo "Trying to rewrite table {$this->tableName}\n";      // Перезапись таблицы, если уже существует
            $this->DropTable($this->tableName);
            $this->CreateTable($this->tableName);
            echo "Tables successfully rewritted\n";
            return 0;
              }
            catch(PDOException $e)
            {
              echo $sql . "\n" . $e->getMessage();
              return 1;
            }
            break;
            case 1:
            echo "Impossible to rewrite table";
          };
      if ($createDBStatus==3)
        $this->CreateTable();
  }


}
?>
