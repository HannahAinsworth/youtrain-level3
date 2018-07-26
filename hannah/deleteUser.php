<?php

require_once('dbconfig.php');

$id = $_GET['userID'];

//now need to delete the chosen user
$sql = "DELETE FROM users WHERE id = " . $id;

$conn->query($sql);

$conn->close();

//redirect user back to users.php
header('location:users.php');


?>