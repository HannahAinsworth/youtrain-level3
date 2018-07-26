<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Orders</title>
</head>

<body>

    <h1>Orders</h1>

    <h2>Customers</h2>

    <?php
    
    $conn = new mysqli('localhost','products_admin','password','products');
  
  echo '<ul>';
  $sql = "SELECT * FROM customers_tbl";
  $result = $conn->query($sql);
  while($row = $result->fetch_array()){
    echo '<li><a href="orders.php?id='.$row['customer_id'].'">' . $row['customer_name'] . '</a></li>';
  }
  echo '</ul>';

  //check if the user has clicked a customer name in the list
  if(isset($_GET['id'])){
    
    $sql = "SELECT * FROM orders_tbl,products_tbl,customers_tbl WHERE orders_tbl.customer_id = $_GET[id] AND customers_tbl.customer_id = orders_tbl.customer_id AND products_tbl.product_id = orders_tbl.product_id";
    $result = $conn->query($sql);
    //var_dump($result->fetch_assoc());
      
      echo'<table border="1">';
      
      while($row = $result->fetch_array()){
          echo '<tr>';
          
          echo '<td>' . $row['product_name'] . '</td>';
          echo '<td>' . $row['product_description'] . '</td>';
          echo '<td>' . $row['product_cost'] . '</td>';
          
          
          
          
          echo '</tr>';
      }
      
      echo '</table>';
      
      
      
  }
  

    
    
    
    ?>



</body>

</html>
