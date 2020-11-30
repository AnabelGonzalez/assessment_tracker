<?php
    require('db_conn.php');
    require('controller/session_id.php');
    
    
    $pdo_statement =$conn->prepare("SELECT assessments.id, users.user_ID, 
    assessments.unit_name, 
    assessments.assessment_name, 
    assessments.due_date
    FROM assessments 
    JOIN users ON users.user_ID = assessments.user_ID
    WHERE users.user_ID=$username
    ORDER BY assessments.due_date");

    //Execute
    $pdo_statement->execute();
    //Store results
    $assessment = $pdo_statement->fetchAll();

    

?>