<?php
require('model/db_conn.php');

// If Session is not set
  if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //redirects to login page
    header('Location: access.php');
    exit;
  }else{
    //If session is started
      $username = $_SESSION['user_id'];
      $pdo_statement = $conn->prepare("SELECT * FROM users WHERE user_ID =$username");
      $pdo_statement->execute();
      $result = $pdo_statement->fetchAll();
    foreach($result as $row) {
        echo '
        <div class="row">
            <div class="col-6">
                <p class="text-dark">Hello, '.$row['name'].'</p>
            </div>
            <div class="col-6">
                <p class="float-right text-dark"><span class="font-weight-bold">Username: </span>'. $row['username'].'</p>
            </div>
        </div>';
    }
  }

  ?>