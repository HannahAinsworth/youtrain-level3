<?php

//echo $_GET['email'];

//connect to db
require_once('dbconfig.php');

//insert user into the database

//create a date stamp of now
$now = date('r');

//store values to save in variables
$name = $_GET['name'];
$email = $_GET['email'];
$message = $_GET['message'];
$category_id = $_GET['categoryID'];
$status = 'pending';

//prepare a parameterised statement - this is a guard against SQL injection and problems with special characters in data submitted from the form
if ( !$stmt = $conn->prepare("INSERT INTO messages (name,email,message,date,category_id,status) VALUES(?,?,?,?,?,?)"))
    echo "Binding Parameter Error: ($conn->errno) $conn->error";

//blind data from form to the statement 
if ( !$stmt->bind_param("ssssis", $name, $email, $message,$now,$category_id,$status) )
    echo "Prepare Error: ($conn->errno) $conn->error";

//execute the prepared statement
if (!$stmt->execute() )
    echo "Execute Error: ($conn->errno) $conn->error";

$conn->close();

header('location:displayMessage.php');
?>
