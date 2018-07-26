<?php
require_once('helpers.php');

//variable declarations
$input; //text input from file
$output=''; //final output of the process
$name; //name of the user
$datatype; //BASIC or UDATA
$data; //data of the user
$input; //file read by program
$line; //each line in the loop
$modified; //the processed string in the loop
$outputFile; // the final output
    
    
//read in a text file to process
$input = fopen("input.txt","r");

if($input){//text file loaded ok
    
    //loop through each line in the text file
    while(($line = fgets($input)) !== false){
        
        //reset the modified variable to a blank string
        $modified = '';
        //now get the name value from the line
        $name = between("NAME=", ",", $line);
        //get the datatype
        if(strpos($line,'BASIC')){
            $datatype = '(BASIC)';//set the datatype 
            $data = after('BASIC=',$line);//grab the data after the words basic=
        }else{
            $datatype = '(UDATA)';//set the datatype
            $data = after('UDATA=',$line);//grab the data after the words udata=
        }
        
        //add substrings to the output
        $output .= $name . "," . $data . $datatype . " \n ";
        
        
    }//end while
    
    //view the processed otput once the loop has finished
    echo $output;
    
    //now write processed data to a file (end point)
    $outputFile = fopen('output.txt', 'w');
    fwrite($outputFile,$output);
    
    
    //close the file streams
    fclose($outputFile);
    fclose($input);
        
        
}else{//text file did not load ok
    echo 'problem loading text file';
}

    
    

  
?>