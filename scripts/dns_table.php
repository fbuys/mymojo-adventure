<?php
    //link to database
    require 'database_connect.php';
    
    $product_id = $_GET['id'];//get product id
    // sending query to get all dns linked to product
    $product_dns_result = mysql_query("SELECT * FROM product_dns WHERE product_id={$product_id}");
    
    //make sure we have results
    if($anymatches = mysql_num_rows($product_dns_result) == 0)
    {
        echo "This product has 0 DNS entries. ";
        //add 'add' button above table
        echo "\n <img src='../images/greenplus.png'id='icon' class='add_dns_icon' /> ";
    }
    else
    { 
        //query to find all DNS entries associated with it
        $sql_query = "SELECT id, record, type, priority, ttl, content, updated_at FROM dnscluster WHERE ( id="; //used for sql queries
        $data = mysql_fetch_array($product_dns_result);//use first row to build query
        //build query to get all associated dns entries
        $sql_query = $sql_query.$data['dns_id'];//add first id to query
        //build query for all products linked to customer, use product_id for rows returned
        while( ($data = mysql_fetch_array($product_dns_result)) == true)
        {
            $sql_query = $sql_query." OR id=";
            $sql_query = $sql_query.$data['dns_id'];//add another id to query

        }
        //finish SQL query
        $sql_query = $sql_query." ) ORDER BY type;";
        //echo $sql_query;
        
        //get result for query just built
        $dns_entries = mysql_query($sql_query); //return list of products
        $fields_num = mysql_num_fields($dns_entries);
        
        //add 'add' button above table
        //echo "</br></br>";
        echo "\n <img src='/images/greenplus.png'id='icon' class='add_dns_icon' /> ";
        
        //build table
        echo "<table id='dns_table'>"; //opening table tag
        echo "<thead>"; //table head
        echo "<tr><th colspan='6'>Manage Product DNS</th></tr><tr>";
        echo "<th>Record</th>";
        echo "<th>Type</th>";
        echo "<th>Prior.</th>";
        echo "<th>TTL</th>";
        echo "<th>Content</th>";
        echo "<th>Delete</th>";
        echo "</tr>\n";
        echo "</thead>";
        echo "<tbody>";
        
        // printing table rows
        while($row = mysql_fetch_array($dns_entries))
        {
            echo "<tr id='{$row['id']}'>"; //open row with id
            echo "<td class='inline' id='record'>{$row['record']}</td>"; //add record cell
            echo "<td class='inlinetype' id='type'>{$row['type']}</td>"; //add type cell
            echo "<td class='inline' id='priority'>{$row['priority']}</td>"; //add priority cell
            echo "<td class='inline' id='ttl'>{$row['ttl']}</td>"; //add ttl cell
            echo "<td class='inline' id='content'>{$row['content']}</td>"; //add content cell
            echo "<td><img src='/images/redx.png'id='icon' class= 'delete_dns_icon'/>"; //cancel icon
            echo "</tr>\n"; //close row
        }
        echo "</tbody>";
        echo "</table>";
        mysql_free_result($dns_entries);///*/

        
    }          
?>
                
            
