<?php
                    
                    $sql_query = "SELECT id, record, type, priority, ttl, content, updated_at FROM dnscluster WHERE ( id="; //used for sql queries
                    $data = mysql_fetch_array($product_dns_result);//use first row to build query
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

                    //add 'add' button above table
                    echo "\n <img src='/images/greenplus.png'id='icon' class='add_icon' /> ";
                    //build table
                    echo "<table id='product_tabel'>";
                        echo    "<thead>";
                        echo    "<tr><th colspan='3'>Manage Client Products</th></tr><tr>";
                        echo "<th>Product</th>";
                        echo "<th>Signup Date</th>";
                        echo "<th>Cancel</th>";
                        echo "</tr>\n";
                     echo    "</thead>";
                     echo    "<tbody>";   
                    // printing table rows
                    while($row = mysql_fetch_row($products))
                    {
                        echo "<tr id='{$row[0]}'>"; //open row with id
                        echo "<td><a>{$row[1]}</a></td>"; //add first cell
                        echo "<td>{$row[2]}</td>"; //add 2nd cell
                        echo "<td><img src='/images/redx.png'id='icon' class= 'cancel_icon'/>"; //cancel icon
                        echo "</tr>\n"; //close row
                    }
                    echo    "</tbody>";
                    mysql_free_result($products);
                    
                    echo "</tbody>";
                    echo "</table>";
                    
                ?>
                
            
