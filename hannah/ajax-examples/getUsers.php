<?php

require_once('../dbconfig.php');
$sql = "SELECT * FROM users ORDER BY surname ASC";
$result = $conn->query($sql);
$rows = array(); //create an empty array
while($row = $result->fetch_assoc()){
    $rows[] = $row;
}

echo json_encode($rows);


?>