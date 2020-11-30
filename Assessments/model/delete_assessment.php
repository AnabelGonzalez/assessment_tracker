<?php

require_once("db_conn.php");

$pdo_statement=$conn->prepare("DELETE FROM assessments WHERE id=" . $_GET['id']);

$pdo_statement->execute();


?>