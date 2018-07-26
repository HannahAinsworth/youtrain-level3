<?php

//change this variable to be the title of the new page
$title = 'Test Tree Class';

//include the header - all pages use the same header
include 'includes/header.php';
    

?>

    <!-- Page content goes here -->
    <div class="container">

        <?php
        
        require_once('classes/Tree.php');
        $myTree = new Tree('../hannah');
       
        ?>

    </div><!-- end of the class=container -->




    <?php

//include the footer - all pages use the same footer
include 'includes/footer.php';
    



?>
