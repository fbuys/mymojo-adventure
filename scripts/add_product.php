<?php

/*
 * This files simply saves the data
 * posted to it, to the users account
 * 
 */

    //connect to database
    require 'database_connect.php';
    
    //save posted variables
    $contact_id = $_GET['id'];
    $product_id = 0;
    $name = $_POST['name'];
    $vendor = $_POST['vendor'];
    $datetime = date("Y-m-d H:i:s");
    
    
    //create query
   $sql_query = "INSERT INTO product ( `name`, `group`, `vendor`, `created_at`, `updated_at`) 
       VALUES ('{$name}', 'Hosting', '{$vendor}', '{$datetime}', '{$datetime}');";
       
    //submit query to database
    $result = mysql_query($sql_query);
    //save newly created ID
    $product_id = mysql_insert_id(); //if 0 then it's a duplicate
    
    //return id if zero 
    if($product_id == 0)
    {
        echo $product_id;
    }//end of if
    else //not a duplicate
    {

        //only add to client_product if not duplicate
        //create query
        $sql_query = "INSERT INTO client_product ( `client_contact_id`, `product_id`, `created_at`, `updated_at`) 
            VALUES ('{$contact_id}', '{$product_id}', '{$datetime}', '{$datetime}');";

        //submit query to database
        $result = mysql_query($sql_query);
        
        //echo saved success
        echo "Created!";
    
    
    
    }//end of else
    
    
    
?>
