<?php

class User extends Dbh{

  protected function getAllUsers(){

    // PDO version
    $stmt = $this->connect()->query("SELECT * FROM users");
    while ($row = $stmt->fetch()) {
      $data[] = $row;
    }

    return $data;

    /*
    SQLI Method
    $sql = "SELECT * FROM users";
    $result = $this->connect()->query($sql);
    $numRows = $result->num_rows;
    if ($numRows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
    */
  }

  public function getUsersWithCountCheck(){
    $id = 6;
    $uid = "Pingrash";

    // PDO prepared statement
    $stmt = $this->connect()->prepare("SELECT * FROM users WHERE idUsers=? AND uidUsers=?");
    $stmt->execute([$id, $uid]);

    if ($stmt->rowCount()) {
      while ($row = $stmt->fetch()) {
        return $row['uidUsers'];
      }
    }
  }
}