<?php

//change this variable to be the title of the new page
$title = 'Upload Image';

//include the header - all pages use the same header
include 'includes/header.php';
    

?>

    <!-- Page content goes here -->
    <div class="container">

        <h1>Upload Image to Page</h1>

<?php

$target_dir = "uploads/";//set variable to reference target folder for upload
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//$_FILES is our way of tageting the actual image that has been uploaded - this variable creates the actual path for the uploaded image eg upload/myUloadedPic.jpg
$uploadOk = 1;//create a variable which will be used when validating the file type - Boolean
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));//store the file extension in a variable making sure its lower case
// Check if image file is a actual image or fake image
if(isset($_POST["hidden"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);//create a variable to store image size - if the file is not an image the getimagesize function returns falso
    if($check !== false) {//if it is actually an image
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    //this the code which actally uploads the file to the target folder
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
        //now register the new file and description in the database
        registerInDB($target_file);
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
        
function registerInDB($target_file){
    
//    echo $target_file;
//    echo '<br';
//    echo $_POST['description'];
    //connect to db
require_once('dbconfig.php');

//insert user into the database

//create a date stamp of now
$now = date('r');

//store values to save in variables
$file_path = $target_file;
$description = $_POST['description'];

//prepare a parameterised statement - this is a guard against SQL injection and problems with special characters in data submitted from the form
if ( !$stmt = $conn->prepare("INSERT INTO images (file_path,description,date_uploaded) VALUES(?,?,?)"))
    echo "Binding Parameter Error: ($conn->errno) $conn->error";

//blind data from form to the statement 
if ( !$stmt->bind_param("sss", $file_path,$description,$now) )
    echo "Prepare Error: ($conn->errno) $conn->error";

//execute the prepared statement
if (!$stmt->execute() )
    echo "Execute Error: ($conn->errno) $conn->error";
    
    echo '<p>Images saved to database</p>';

$conn->close();
    
    header('location:images.php');
    
    
}        



?>



    </div><!-- end of the class=container -->




    <?php

//include the footer - all pages use the same footer
include 'includes/footer.php';
    



?>
