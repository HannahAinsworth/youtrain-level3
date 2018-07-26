<?php

//header('Content-Type: text/html; charset=utf-8');
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Credentials: true");
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
// header('P3P: CP="CAO PSA OUR"'); // Makes IE to support cookies
// header("Content-Type: application/json; charset=utf-8");

$users = $_POST['users'];//this is an array sent from client

function createProfileConnection(){
  return new mysqli('localhost','challengefuj1','password','challenge-fuj1');
}

$conn = createProfileConnection();
//check if NOT connected OK
if($conn->connect_error){
  echo 'Connection Error: ' . $conn->connect_error;
  exit();
}



//declare variable to start at the beginnig of $users array
$num = 0;
//loop thru each item in the $users array
foreach($users as $user){
  $num++;
  //echo $user['f_name'];
  //insert into users table here
  if ( !$stmt = $conn->prepare("INSERT INTO users (f_name,l_name,student_id) VALUES(?,?,?)") )
    echo "Prepare Error: ($conn->errno) $conn->error";

    if ( !$stmt->bind_param("ssi", $user['f_name'],$user['l_name'],$user['id']) )
    echo "Binding Parameter Error: ($conn->errno) $conn->error";

    if ( !$stmt->execute() )
    echo "Execute Error: ($stmt->errno)  $stmt->error";

//$sql = "INSERT INTO users SET f_name='$user['f_name']', l_name='$user['l_name']',student_id=$user['user_id']";
//$sql->query($sql);
}

//send message back to client side to confirm operation complete
echo $num . ' users added';


?>
