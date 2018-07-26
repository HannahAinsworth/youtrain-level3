<?php

require_once('dbconfig.php');

$image_id = $_GET['imageID'];

//now need to delete the chosen user
$sql = "DELETE FROM images WHERE image_id = " . $image_id;

$conn->query($sql);

$conn->close();

//redirect user back to users.php
header('location:images.php');


?>