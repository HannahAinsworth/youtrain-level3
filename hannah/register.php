<?php

//change this variable to be the title of the new page
$title = 'Register User';

//include the header - all pages use the same header
include 'includes/header.php';
    

?>

    <!-- Page content goes here -->
    <div class="container">

        <h1>Register</h1>

        <form action="registerUser.php" method="get">
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input class="form-control" type="text" name="firstname">
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input class="form-control" type="text" name="surname">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email">
            </div>

            <button type="submit" class="btn btn-success">Register</button>
        </form>

    </div>
    <!-- end of the class=container -->




    <?php

//include the footer - all pages use the same footer
include 'includes/footer.php';
    



?>
