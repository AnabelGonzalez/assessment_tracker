<?php

    require('db_conn.php');

    $id = $_GET['id'];
    
    $pdo_statement =$conn->prepare("SELECT * FROM assessments
    WHERE id= $id");

    //Execute
    $pdo_statement->execute();
    //Store results
    $assessment = $pdo_statement->fetchAll();

?>