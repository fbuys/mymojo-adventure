<?php
    //link to database
    require_once '../scripts/database_connect.php';
    
    $dns_id = $_POST['dnsid'];//get product id
    $field = trim($_POST['id']); //field name saved in id
    $updated_data = trim($_POST['data']); //new data saved in data
    $datetime = date("Y-m-d H:i:s"); //use to update updated at time
    
//    echo $dns_id."</br>";
//    echo $field."</br>";
//    echo $updated_data."</br>";
    
    
    //create query to update this specific product
    $sql_query = "UPDATE dnscluster SET {$field}='{$updated_data}', updated_at='{$datetime}' WHERE id={$dns_id};";
    //echo $sql_query;
    //submit query to database
    mysql_query($sql_query); 
    
    //echo updated data
    echo trim($updated_data);
//    echo trim($dns_id);
    echo var_dump($_POST);
//    echo $sql_query;
   
    
?>
                
            
