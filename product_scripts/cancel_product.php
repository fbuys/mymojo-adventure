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

    //create query
    $sql_query = "DELETE FROM product WHERE id={$id}";
    
    //run query
    mysql_query($sql_query);
    
    //create query
    $sql_query = "DELETE FROM client_product WHERE product_id={$id}";
    
    //run query
    mysql_query($sql_query);
    
?>
