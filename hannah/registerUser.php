<?php

//echo $_GET['email'];

//connect to db
require_once('dbconfig.php');

//insert user into the database

//create a date stamp of now
$now = date('r');

$sql = "INSERT INTO users (firstname,surname,email,date_registered) VALUES('$_GET[firstname]','$_GET[surname]','$_GET[email]','$now')";

$conn->query($sql);

$conn->close();

header('location:users.php');
?>
