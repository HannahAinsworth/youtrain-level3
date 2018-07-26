<?php

//change this variable to be the title of the new page
$title = 'Update Message';

//include the header - all pages use the same header
include 'includes/header.php';
    

?>

    <!-- Page content goes here -->
    <div class="container">

        <h1>Update Message</h1>

        <?php
        //store the message id which has been passed from messages.php
            $id = $_GET['messageID'];
        //connect to the database using our dbconfig file
            require_once('dbconfig.php');
        //prepare a sql statement to get the message with the id passed from messages.php
            $sql = "SELECT * FROM messages WHERE id=" . $id;
        //run the sql query
            $result = $conn->query($sql);
            //loop through each result
            while($row = $result->fetch_assoc()){
                //store data returned from database in variables to use further down the page
                $name = $row['name'];
                $email = $row['email'];
                $message = $row['message'];
                $date = $row['date'];
                $status = $row['status'];
            }
        
        //good house keeping to manage memory usage on the server
        $conn->close();
            
        ?>
        
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Name</strong>
                <p><?php echo $name; ?></p>
            </li>
            <li class="list-group-item">
                <strong>Email</strong>
                <p><?php echo $email; ?></p>
            </li>
            <li class="list-group-item">
                <strong>Message</strong>
                <p><?php echo $message; ?></p>
            </li>
            <li class="list-group-item">
                <strong>Date</strong>
                <p><?php echo $date; ?></p>
            </li>
        </ul>
        
<!--        any fields that we wish to edit must be inside the form -->

            <form action="updateMessageStatus.php" method="get">
                
<!--                store the id of the message to be updated in a hidden field this value is passed to the action page and insures we update the corect message-->
                <input type="hidden" name="messageID" value="<?php echo $id; ?>">
                
<!--                example of prepopulating an input element with a value from the database-->
                <div class="form-group">
                    <label for="email">Edit the email here</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                </div>
                
<!--                example of prepopulating an text area element with a value from the database-->
                <div class="form-group">
                    <label for="message">Edit the message here</label>
                    <textarea name="message" class="form-control"><?php echo $message; ?>
                    </textarea>
                </div>
                
<!--                example of prepopulating an select menu element with a value from the database-->
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option <?php if($status=='pending') echo 'selected' ; ?>>pending</option>
                        <option <?php if($status=='complete') echo 'selected' ; ?>>complete</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update Status</button>


            </form>

    </div>
    <!-- end of the class=container -->




    <?php

//include the footer - all pages use the same footer
include 'includes/footer.php';
    



?>
