<?php
error_reporting(1);
ini_set('display_errors');

require_once('db_conn.php');

    if(isset($_POST['submit'])){

        $user = $_POST['user_ID'];

        $unit = $_POST['unit_name'];

        $assessment = $_POST['assessment_name'];

        $date = $_POST['due_date'];

        $sql = "INSERT INTO assessments (user_ID, unit_name, assessment_name, due_date) VALUES  (?,?,?,?)";
        $conn->prepare($sql)->execute([$user, $unit, $assessment, $date]);

    
    } else{
            echo "Not sent";
        }




?>