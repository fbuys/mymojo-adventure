<?php

/*
 * This files simply saves the data
 * posted to it, to the users account
 * 
 */

    //connect to database
    require_once '../scripts/database_connect.php';
    
    //save posted variables
    $product_id = $_GET['id'];
    $record = $_POST['record'];
    $type = $_POST['type'];
    $priority = $_POST['priority'];
    $content = $_POST['content'];
    $ttl = $_POST['ttl'];
    $datetime = date("Y-m-d H:i:s");
    
    //add slashes and remove spaces
    if(preg_match("/^\d+$/",  trim($product_id)) == 1){
        $secured_product_id = trim($product_id);
    }
    else {
        $secured_product_id = "";
    }
    $secured_record = trim(addslashes($record));
    $secured_type = trim(addslashes($type));
    $secured_priority = trim(addslashes($priority));
    $secured_content = trim(addslashes($content));
    $secured_ttl = trim(addslashes($ttl));
    $secured_datetime = trim(addslashes($datetime));
    

    
    $sql_query = "INSERT INTO dnscluster ( `record`, `type`, `priority`, `ttl`, `content`, `created_at`, `updated_at`) 
           VALUES ('{$secured_record}', '{$secured_type}', '{$secured_priority}', '{$secured_ttl}', '{$secured_content}', '{$secured_datetime}', '{$secured_datetime}');";

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
    {//only add to client_product if not duplicate
        //create query
         
        //create query
        $sql_query = "INSERT INTO product_dns ( `dns_id`, `product_id`, `created_at`, `updated_at`) 
                VALUES ('{$dns_id}', '{$secured_product_id}', '{$secured_datetime}', '{$secured_datetime}');";
    
            //submit query to database
            $result = mysql_query($sql_query);
            
            //echo saved success
            echo "Created!";
    ////        echo "</br>";
    ////        echo $dns_id;
    ////        echo "</br>";
    ////        echo $secured_product_id;
    ////        echo "</br>";
    ////        echo $secured_record;
    ////        echo "</br>";
    ////        echo $secured_type;
    ////        echo "</br>";
    ////        echo $secured_priority;
    ////        echo "</br>";
    ////        echo $secured_content;
    ////        echo "</br>";
    ////        echo $secured_ttl;
    ////        echo "</br>";
    ////        echo $secured_datetime;
    //    
    //    
    //    
    }//end of else*/
    
    
    
?>
