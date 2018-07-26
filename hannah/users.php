<?php

//change this variable to be the title of the new page
$title = 'List of Users';

//include the header - all pages use the same header
include 'includes/header.php';
    

?>

    <!-- Page content goes here -->
    <div class="container">


        <?php

        //connect to db 
        require_once('dbconfig.php');
        
        //go get all the users
        $sql = "SELECT firstname,surname,id FROM users";
        $result = $conn->query($sql);
        
        //developer function in order to view results
        //var_dump($result);
            
        echo 'Currently we have ' . $result->num_rows . ' users';    
            
        ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php    
            
        //loop thu all results and create a table row for each
        while($row = $result->fetch_assoc()){
            echo '<tr>';
            echo '<td>'. $row['firstname'] . '</td>';
            echo '<td>'. $row['surname'] . '</td>';
            echo '<td><a href="javascript:confirmDelete('.$row['id'].');">delete</a></td>';
            echo '</tr>';
        } 
            
        $conn->close();    
        
        ?>
                </tbody>
            </table>

    </div>
    <!-- end of the class=container -->

    <script>
        function confirmDelete(id){
            var yes = confirm('Are you sure you want to delete this user?');
            if(yes == true){
                window.location = 'deleteUser.php?userID='+id;
            }
        };

    </script>


    <?php

//include the footer - all pages use the same footer
include 'includes/footer.php';
    



?>
