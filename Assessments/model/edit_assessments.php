<?php

require('db_conn.php');

// Update query
if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $unit = $_POST['unit_name'];
    $assessment = $_POST['assessment_name'];
    $due_date = $_POST['due_date'];

    $sql = $conn->prepare( "UPDATE assessments SET unit_name= :unit, assessment_name= :assessment, due_date= :due_date WHERE id='$id'");

    $sql-> bindParam(':unit', $unit, PDO::PARAM_STR);
    $sql-> bindParam(':assessment', $assessment, PDO::PARAM_STR);
    $sql-> bindParam(':due_date', $due_date, PDO::PARAM_STR);
    $sql->execute();

    header('Location: ../index.php');
}

?>