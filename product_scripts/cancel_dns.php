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
    
    if(preg_match("/^\d+$/",  trim($id)) == 1){
        $secured_id = trim($id);
    }
    else {
        $secured_id = "";
    }

    //create query
    $sql_query = "DELETE FROM dnscluster WHERE id={$secured_id}";
    //echo $sql_query;
    //run query
    mysql_query($sql_query);
    
    //create query
    $sql_query = "DELETE FROM product_dns WHERE dns_id={$secured_id}";
    //echo $sql_query;
    //run query
    mysql_query($sql_query);
    
    
    
?>
