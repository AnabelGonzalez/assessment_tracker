<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

require('db_conn.php');
require('controller/session_id.php');

    
$pdo_statement =$conn->prepare("SELECT * FROM users 
WHERE user_id='$username';");

//Execute
$pdo_statement->execute();
//Store results
$user = $pdo_statement->fetchAll();



?>