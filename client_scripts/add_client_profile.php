<?php

/*
 * This files simply saves the data
 * posted to it, to the users account
 * 
 */

    //connect to database
    require '../scripts/database_connect.php';
    
    //save posted variables
    $id = $_GET['id'];
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $datetime = date("Y-m-d H:i:s");
    
    
    
    //create query
   $sql_query = "INSERT client_contact SET first_name='{$first_name}',
        last_name='{$last_name}', username='{$email}', updated_at='{$datetime}';";
        //echo $sql_query;
        
    //submit query to database
    mysql_query($sql_query);
    
    //save newly created ID
    $contact_id = mysql_insert_id(); //if 0 then it's a duplicate
    
    //send new contact id back;
    echo $contact_id;
    
    
?>
