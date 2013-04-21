<?php

/*
 * This files simply saves the data
 * posted to it, to the users account
 * 
 */

    //connect to database
    require_once '../scripts/database_connect.php';
    
    //save posted variables
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $datetime = date("Y-m-d H:i:s");
    
    //add slashes and remove spaces
    $secured_first_name = trim(addslashes($first_name));
    $secured_last_name = trim(addslashes($last_name));
    $secured_email = trim(addslashes($email));
    $secured_datetime = trim(addslashes($datetime));
    
    
    
    
    
    //create query
    $sql_query = "INSERT client_contact SET first_name='{$secured_first_name}',
        last_name='{$secured_last_name}', username='{$secured_email}', updated_at='{$secured_datetime}';";
        //echo $sql_query;

    //submit query to database
    mysql_query($sql_query);

    //save newly created ID
    $contact_id = mysql_insert_id(); //if 0 then it's a duplicate

    //send new contact id back;
    echo stripcslashes($contact_id);
        
    

    
?>
