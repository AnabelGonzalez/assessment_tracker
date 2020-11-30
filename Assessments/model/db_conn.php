<?php
//database connection details
$servername = "mysql:host=localhost;dbname=Gonzalez_assess_tracker";
$username = "root";
$password = "";

try {
    $conn = new PDO($servername, $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    // Get error if connection fails
    echo "Connection failed: " . $e->getMessage();
    }

?>