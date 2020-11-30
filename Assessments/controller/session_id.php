<?php

if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //redirects to login page
    header('Location: access.php');
    exit;
  }else{
    //If session is started
      $username = $_SESSION['user_id'];}

?>