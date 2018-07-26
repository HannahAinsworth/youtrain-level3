<?php

//change this variable to be the title of the new page
$title = 'Upload Image';

//include the header - all pages use the same header
include 'includes/header.php';
    

?>

    <!-- Page content goes here -->
    <div class="container">

        <h1>Upload Image</h1>
        
        <form action="uploadAndSaveImage.php" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="fileToUpload">Select an Image to Upload:</label>
                <input class="form-control" type="file" name="fileToUpload">
            </div>
                  
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" type="text" name="description"></textarea>
            </div>
            
            <input type="hidden" name="hidden" value="1">
            
            <button type="submit" class="btn btn-primary">Upload</button>
          
        </form>

    </div><!-- end of the class=container -->




    <?php

//include the footer - all pages use the same footer
include 'includes/footer.php';
    



?>
