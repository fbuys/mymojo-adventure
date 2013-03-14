<?php

/*
 * This files simply saves the data
 * posted to it, to the users account
 * 
 */

    //connect to database
    require 'database_connect.php';
    
    //save posted variables
    $product_id = $_GET['id'];
    $record = $_POST['record'];
    $type = $_POST['type'];
    $priority = $_POST['priority'];
    $content = $_POST['content'];
    $ttl = $_POST['ttl'];
    $datetime = date("Y-m-d H:i:s");
    
    
    //create query
   $sql_query = "INSERT INTO dnscluster ( `record`, `type`, `priority`, `ttl`, `content`, `created_at`, `updated_at`) 
       VALUES ('{$record}', '{$type}', '{$priority}', '{$ttl}', '{$content}', '{$datetime}', '{$datetime}');";
   
   //echo $sql_query;
    //submit query to database
    $result = mysql_query($sql_query);
    //save newly created ID
    $dns_id = mysql_insert_id(); //if 0 then it's a duplicate
    
    //return id if zero 
    if($dns_id == 0)
    {
        echo $dns_id;
    }//end of if
    else //not a duplicate
    {

        //only add to client_product if not duplicate
        //create query
        $sql_query = "INSERT INTO product_dns ( `dns_id`, `product_id`, `created_at`, `updated_at`) 
            VALUES ('{$dns_id}', '{$product_id}', '{$datetime}', '{$datetime}');";

        //submit query to database
        $result = mysql_query($sql_query);
        
        //echo saved success
        echo "Created!";
    
    
    
    }//end of else*/
    
    
    
?>
