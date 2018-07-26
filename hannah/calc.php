<?php

//change this variable to be the title of the new page
$title = 'VAT Calculator';

//include the header - all pages use the same header
include 'includes/header.php';
    

?>



    <?php
    //check to see if form has been posted- ie are there any url parameters?
    if(isset($_GET['subtotal'])){
        //calculate the total
        $subtotal = $_GET['subtotal'];
        $percent = $_GET['percent'];
        $total = $subtotal + ($subtotal*$percent/100);
    }

?>

        <!-- Page content goes here -->
        <div class="container">

            <h1>
                <?php echo $title;     ?>
            </h1>

            <form action="" method="get">

                <div class="form-group">
                    <input class="form-control" type="number" name="subtotal" placeholder="Subtotal">
                </div>

                <div class="form-group">
                    <input class="form-control" type="number" name="percent" placeholder="VAT Percentage">
                </div>

                <button class="btn btn-primary" type="submit">Calculate Total</button>
            </form>

            <output>
            <?php 
                if(isset($_GET['subtotal'])){
                echo $total;  
                    
                }
            ?>
            </output>

        </div>
        <!-- end of the class=container -->




        <?php

//include the footer - all pages use the same footer
include 'includes/footer.php';
    



?>
