<?php

//change this variable to be the title of the new page
$title = 'Messages';

//include the header - all pages use the same header
include 'includes/header.php';
    

?>

    <!-- Page content goes here -->
    <div class="container">


        <?php

        //connect to db 
        require_once('dbconfig.php');
        
        //first go get the categories for the category filter
        $sql = 'SELECT * FROM contact_categories';
        $result = $conn->query($sql);
        
        
         //build links which will allow the user to filter each of the categories.
        echo '<div class="cat-links">';
        
        //check if active-cat is needed on this link
        if(isset($_GET['catID'])==false){
            echo '<a class="active-cat" href="displayMessage.php">All</a>'; 
        }else{
            echo '<a href="displayMessage.php">All</a>';
        }
        
        while($row = $result->fetch_assoc()){
            
           //check if active-cat is needed on this link 
            if(isset($_GET['catID'])){
                
                if($_GET['catID'] == row['cat_id']){
                    echo '<a class="active-cat" href="displayMessage.php?catID=' . $row['cat_id'] . '">' . $row['category'] . '</a>';
                }else{
                    echo '<a href="displayMessage.php?catID=' . $row['cat_id'] . '">' . $row['category'] . '</a>';
                }
                     
            }else{
                echo '<a href="displayMessage.php?catID=' . $row['cat_id'] . '">' . $row['category'] . '</a>'; 
            }
            
           
            
        }
        echo '</div>';
        
        
        
        
        //go get all the messages
        $sql = "SELECT name,email,message,date,category_id,category,cat_id,status,id FROM messages, contact_categories WHERE messages.category_id = contact_categories.cat_id";
        
        if(isset($_GET['catID'])){
            //note the space before the word AND
            $sql .= ' AND messages.category_id = ' .$_GET['catID'];
        }
        
        
        $result = $conn->query($sql);
        
        //developer function in order to view results
        //var_dump($result);
            
        echo 'There are currently ' . $result->num_rows . ' messages';   
        
       
        
        ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
       
        //loop thu all results and create a table row for each
        while($row = $result->fetch_assoc()){
            echo '<tr>';
            echo '<td>'. $row['name'] . '</td>';
            echo '<td>'. $row['email'] . '</td>';
            echo '<td>'. $row['message'] . '</td>';
            echo '<td>'. $row['date'] . '</td>';
            echo '<td>'. $row['category'] . '</td>';
            echo '<td>'. $row['status'];
            echo '<br><a href="updateMessage.php?messageID='.$row['id'].'">change</a>';
            echo '</td>';
            echo '</tr>';
        } 
            
        $conn->close();    
        
        ?>
                </tbody>
            </table>

    </div>
    <!-- end of the class=container -->




    <?php

//include the footer - all pages use the same footer
include 'includes/footer.php';
    



?>
