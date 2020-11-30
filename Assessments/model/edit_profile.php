<?php

require('db_conn.php');

// Update query
if(isset($_POST['submit'])){

    $id = $_POST['user_ID'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];

    $sql = $conn->prepare( "UPDATE users SET email= :email, name=:name, last_name=:last_name WHERE user_ID='$id'");

    $sql-> bindParam(':email', $email, PDO::PARAM_STR);
    $sql-> bindParam(':name', $name, PDO::PARAM_STR);
    $sql-> bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $sql->execute();

}

?>