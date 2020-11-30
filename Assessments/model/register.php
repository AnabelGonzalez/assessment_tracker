<?php

ini_set('display_errors', 1);
//error_reporting(~0);


require('../model/db_conn.php');



if(isset($_POST['submit'])) { 

    // Check that username and password are not empty and delete white spaces before and after the string
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $last_name = !empty($_POST['last_name']) ? trim($_POST['last_name']) : null;
    
    //Construct the SQL statement and prepare it. Checks if the username was previously used
    $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($row['num'] > 0){
        die('That username already exists!');
    }
    
    //Hash the password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    
    $email = $_POST['email'];

    // Filter Email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $filter_email = $_POST['email'];
    } else {
        echo 'Email not valid <br>';
        echo '<a href="../access.php">Go Back</a>';
      }
    
    //SQL query to insert data in the database
    $sql = "INSERT INTO users (username, password, name, last_name, email) VALUES (:username, :password, :name, :last_name, :email)";

    $stmt = $conn->prepare($sql);
    
    //Bind  variables.
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':last_name', $last_name);
    $stmt->bindValue(':email', $filter_email);

    $result = $stmt->execute();

    if($result){
        echo 
        '<div class="wrapper">
            <h1 class="sucess">Account succesfully created.</h1>
            <div class="loading">
                <div class="loader"></div>
                    <p class="sucess-redirect">Sucess!</p>
                </div>
        </div>';
        header( "refresh:3;url=../index.php");
    }

}
?>