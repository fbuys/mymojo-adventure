<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="/css/general.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MyMojo-clientproduct</title>
    </head>
    <body>
        
        <!--heading + logo-->
        <div id="heading">
        <h1><a href="index.php">Afrihost - MyMojo</a></h1>
        </div>
        
        <!--toolbar -->
        <div id="toolbar">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="newclient.php">New</a>
                </li> 
                <li>
                    <?php
                    echo "<a href=\"clientprofile.php?id=".$_GET['id']."\">Contact Details</a> \n";
                    ?>
                </li>
                <li>
                    <?php
                    echo "<a href=\"clientproduct.php?id=".$_GET['id']."\">Product Details</a>\n";
                    ?>
                </li>
            </ul>
        </div>
        
        <div id="productDetails">
            
               <?php
                    //link to database
                    require 'scripts/database_connect.php';
                    //get client id (GET request)
                    $client_id = $_GET['id'];
                    
                    // sending query to get all products linked to client
                    $client_product_result = mysql_query("SELECT * FROM client_product WHERE client_contact_id={$client_id}");
                    //make sure we have results
                    if($anymatches = mysql_num_rows($client_product_result) == 0)
                    {
                        echo "This client has 0 products with us. ";
                    }
                    else
                    {
                        $sql_query = "SELECT * FROM product WHERE ( id="; //used for sql queries
                        ($data = mysql_fetch_array($client_product_result));//use first row to build query
                        $sql_query = $sql_query.$data['product_id'];//add first id to query
                        //build query for all products linked to customer, use product_id for rows returned
                        while( ($data = mysql_fetch_array($client_product_result)) == true)
                        {
                            $sql_query = $sql_query." OR id=";
                            $sql_query = $sql_query.$data['product_id'];//add another id to query

                        }
                        //finish SQL query
                        $sql_query = $sql_query." );";
                        
                        //get result for query just built
                        $products = mysql_query($sql_query); //return list of products
                        $fields_num = mysql_num_fields($products);
                        
                        //build table
                        echo "<table>";
                            echo    "<thead>";
                            echo    "<tr><th colspan=\"{$fields_num}\">Manage Client Products</th></tr><tr>";
                            // printing table headers
                            for($i=0; $i<$fields_num; $i++)
                            {
                                $field = mysql_fetch_field($products);
                                echo "<th>{$field->name}</th>";
                            }
                        echo "</tr>\n";
                            
                        // printing table rows
                        while($row = mysql_fetch_row($products))
                        {
                            echo "<tr>";

                            // $row is array... foreach( .. ) puts every element
                            // of $row to $cell variable
                            foreach($row as $cell)
                                echo "<td>$cell</td>";

                            echo "</tr>\n";
                        }
                        mysql_free_result($result);
                    }
                    
                    
                
            
                    
                        
                        
                       /* echo    "<tr><th>ID</th><th>First Name</th><th>Last Name</th>";
                echo    <th>Email Address</th><th>Message</th><th>Success?</th></tr>
                echo</thead>
                echo<tbody>

                    
            /
                    // printing table rows
                    while($row = mysql_fetch_row($result))
                    {
                        echo "<tr>";

                        // $row is array... foreach( .. ) puts every element
                        // of $row to $cell variable
                        foreach($row as $cell)
                            echo "<td>$cell</td>";

                        echo "</tr>\n";
                    }
                    mysql_free_result($result);*/
                ?>
                
            </tbody>
        </table>
            
        </div>
        
        
    </body>
</html>
