<!doctype html>
<html>
    <head>
        <title>Insert Thing Form</title> 
    </head>

    <body>
    
        <h1>Insert Thing</h1>
        
        <form action="insertThingAction.php" method="get">
        
            <div class="form-group">
                <label for="title">Title of thing</label>
                <input type="text" name="title" required class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description of thing</label>
                <textarea name="description" required class="form-control"></textarea>
            </div>
            
            <div class="form-group">
            
            <select name="category">
                <?php
                //connect to the database
                $conn = new mysqli('localhost','portfolio-hannah', 'password', 'portfolio-hannah');
                
                if($conn->connect_errno){
                    die(' Problem: ' . $conn->connect_errno);
                }
                
                $sql = "SELECT * FROM categories";
                
                $result = $conn->query($sql);
                
                while($row = $result->fetch_assoc()){
                    echo '<option value="'.$row['project_id'].'">'.$row['cat_label'].'</option>';
                }
                
                ?>
                </select>
                
            </div> 
            
            <button type="submit" class="btn btn-primary">Insert</button>
            
        </form>
    
    </body>
        

</html>