<?php
    //link to database
    require 'database_connect.php';
    
    $dns_id = $_GET['id'];//get product id
    $field = trim($_POST['id']); //field name saved in id
    $updated_data = trim($_POST['data']); //new data saved in data
    $datetime = date("Y-m-d H:i:s"); //use to update updated at time
    
//    echo $dns_id."</br>";
//    echo $field."</br>";
//    echo $updated_data."</br>";
    
    
    //create query to update this specific product
    $sql_query = "UPDATE dnscluster SET {$field}='{$updated_data}', updated_at='{$datetime}' WHERE id={$dns_id};";
    //submit query to database
    mysql_query($sql_query); 
    
    //echo updated data
    echo trim($updated_data);
   
    
?>
                
            
