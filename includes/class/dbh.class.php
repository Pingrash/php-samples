<?php

class Dbh {
  
  private $servername;
  private $username;
  private $password;
  private $dbname;
  private $charset;

  public function connect() {
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "loginsystem";
    $this->charset = "utf8mb4";

    try {
      $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;

      $pdo = new PDO($dsn, $this->username, $this->password);

      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection failed: ".$e->getMessage();
    }

    //$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    
    return $pdo;
  }
}