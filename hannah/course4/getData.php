<?php

$task = $_POST['task'];

$conn = new mysqli('localhost','products_admin','password','products');

switch($task){
    case 'getCustomers': 
        $sql = "SELECT * FROM customers_tbl";
        $result = $conn->query($sql);
        $customers = array();
        while($row = $result->fetch_array()){
            array_push($customers,$row);
  }
        echo json_encode($customers);
        break;
    case 'getOrders';
        $sql = "SELECT * FROM orders_tbl,products_tbl,customers_tbl WHERE orders_tbl.customer_id = $_POST[id] AND customers_tbl.customer_id = orders_tbl.customer_id AND products_tbl.product_id = orders_tbl.product_id";
        $result = $conn->query($sql);
        $orders = array();
        while($row = $result->fetch_array()){
            array_push($orders,$row);
  }
        echo json_encode($orders);
        break;
    default:
        echo 'No task was declared';
        break;
}


?>
