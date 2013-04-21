<?php

/*
 * This files simply saves the data
 * posted to it, to the users account
 * 
 */

    //connect to database
    require_once '../scripts/database_connect.php';
    
    
    //save posted variables
    $id = $_GET['id'];
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $datetime = date("Y-m-d H:i:s");
    
    //add slashes and remove spaces
    if(preg_match("/^\d+$/",  $id) == 1){
        $secured_id = $id;
    }
    else {
        $secured_id = "";
    }
    $secured_first_name = trim(addslashes($first_name));
    $secured_last_name = trim(addslashes($last_name));
    $secured_email = trim(addslashes($email));
    $secured_datetime = trim(addslashes($datetime));
    
    
    
    //create query
   $sql_query = "UPDATE client_contact SET first_name='{$secured_first_name}',
        last_name='{$secured_last_name}', username='{$secured_email}', updated_at='{$secured_datetime}' WHERE id={$secured_id};";
     
        
//    echo $id;
//    echo "</br>";
//    echo preg_match("/^\d+$/",$id);   
//    echo "</br>";
//    echo $secured_id;
//    echo "</br>";
//    echo $secured_first_name;
//    echo "</br>";
//    echo $secured_last_name;
//    echo "</br>";
//    echo $secured_email;
//    echo "</br>";
//    echo $secured_datetime;
//    echo "</br>";
//    echo $sql_query;
        
    //submit query to database
    mysql_query($sql_query);
    
?>
