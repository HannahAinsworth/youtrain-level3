<style>
    .file{
        list-style-image: url(classes/file.png);
    }
    
    .folder{
        list-style-image: url(classes/folder.png);
    }
</style>

<script>

    $(document).ready(function(){
        
        //hide all nested lists
        $('ul ul').hide();
        //listen for user clicking on a folder item
        $('.folder > a').click(function(event){
            //stop browser doing what it is programmed to do by default  
            event.preventDefault();
            var list = $(this).parent().find('>ul');
            list.fadeToggle();
        });
        
        
    });


</script>


<?php

class Tree{
    
   //constructor function
   function __construct($dir=''){
       
       if($dir == ''){
           echo 'Problem, we need a directory';
       }else{
           $this->listFilesInFolders($dir);
       } 
   } 
    
   //create a private method of the class - can only be called from within the class itself 
   private function listFilesInFolders($dir){
       //create array which stores all items in the $dir
       $items = scandir($dir);
       echo '<ul>';
       //loop through each item in $items
       foreach($items as $item){
           
           //prepare a css class for styling
           $cssClass = 'file';
           if(is_dir($dir.'/'.$item)){
               $cssClass = 'folder';
           }
           
           //ignore files with a . in the name
           if($item[0]!='.'){
           echo '<li class="'.$cssClass.'"><a href="'.$dir.'/'.$item.'">'.$item.'</a>';
               
               if(is_dir($dir.'/'.$item)){
                   $this->listFilesInFolders($dir.'/'.$item);
               }
               
               echo '</li>';
               
           }
           
        
       }
       echo '</ul>';
   }
    
}



?>
