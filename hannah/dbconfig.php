<?php

//connect to the database
//('localhost','super-user-name','password','database-name')
$conn = new mysqli('localhost','fuj.php','password','fuj-php');
//check if connectio to database was successful
if($conn->connect_errno){
    echo $conn->connect_errno;
    echo $conn->connect_error;
    exit();
}

?>