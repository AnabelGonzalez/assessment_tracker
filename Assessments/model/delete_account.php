<?php
session_start();
require_once("db_conn.php");

$user_ID = $_GET['id'];


//End Session

unset($_SESSION['user_id']);

//Delete Account
$delete_account=$conn->prepare("DELETE FROM users WHERE user_ID= $user_ID" );

//Execute queries
$delete_account->execute();


?>