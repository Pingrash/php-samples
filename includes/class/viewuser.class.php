<?php

class ViewUser extends User{

  // Function to echo all users in the loginsystem database
  public function showAllUsers(){
    $datas = $this->getAllUser();
    foreach ($datas as $data) {
      echo '<div class="classes-user">';
      echo 'ID: '.$data['idUsers'].'<br>';
      echo 'Username: '.$data['uidUsers'].'<br>';
      echo 'Email: '.$data['emailUsers'].'<br>';
      echo '</div>';
    }
  }
}