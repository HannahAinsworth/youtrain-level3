<?php

//change this variable to be the title of the new page
$title = 'Contact';

//include the header - all pages use the same header
include 'includes/header.php';
    

?>

    <!-- Page content goes here -->
    <div class="container">

        <form action="saveMessage.php" method="get">
            <div class="form-group">
                <label for="name">Name:</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="text" name="email">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" name="message"></textarea>
            </div>

            <div class="form-group">
                <label for="category">Please select a category for your message:</label>
                <select name="categoryID" class="form-control">
                    <?php
                    //go get the categories from the DB
                    require_once('dbconfig.php');
                    $sql="SELECT * FROM contact_categories";
                    $result = $conn->query($sql);
                    while($category = $result->fetch_assoc()){
                        
                        echo '<option value="' . $category['cat_id'] . '">' . $category['category'] . '</option>';                        
                    }
                    
                    $conn->close();
                    
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Register</button>
        </form>

    </div>
    <!-- end of the class=container -->




    <?php

//include the footer - all pages use the same footer
include 'includes/footer.php';
    



?>
