<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="/css/general.css"/>
        <script type ="text/javascript" src="scripts/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="scripts/cancelproduct.js"></script>
        <script type="text/javascript" src="scripts/addproduct.js"></script>
        <script type="text/javascript" src="scripts/dnseditview.js"></script>
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
                        //add 'add' button above table
                        echo "\n <img src='/images/greenplus.png'id='icon' class='add_icon' /> ";
                    }
                    else
                    {
                        $sql_query = "SELECT id, name, created_at FROM product WHERE ( id="; //used for sql queries
                        $data = mysql_fetch_array($client_product_result);//use first row to build query
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
                    }
                ?>
                
            </tbody>
        </table>
            
        </div>
        
        <div id="dnstable"></div>
        
        <div id="popupNewDns">
        <a id="popupDnsClose">x</a>
        <h1>Add New DNS Record</h1>
        <form id="DnsForm">
        Please note ALL fields are mandatory!
        <br/><br/>
        * Record : <input type="text" name="record" value=""><br/>
        * Type :  <select name="type">
                    <option value="SOA">SOA</option>
                    <option value="A">A</option>
                    <option value="MX">MX</option>
                    <option value="CNAME">CNAME</option>
                    <option value="NS">NS</option>
                    <option value="PTR">PTR</option>
                    <option value="TXT">TXT</option>
                    <option value="WRK">WRK</option>
                    <option value="SRV">SRV</option>
                 </select><br/>
        * Priority (for MX) : <input type="text" name="priority" value=""><br/>
        * Content : <input type="text" name="content" value=""><br/>
        * TTL : <input type="text" name="ttl" value=""><br/>
                 <input id="adddnssubmit" type="submit" value="Add">
                 <p></p>
        <br/>
        Press ESCAPE, Click on X (right-top) or Click Out from the popup to close the popup!
        
        </form>
        </div>
        
        <div id="popupNewProduct">
        <a id="popupProductClose">x</a>
        <h1>Add New Product</h1>
        <form id="productForm">
        Please note ALL fields are mandatory!
        <br/><br/>
        * Domain : <input type="text" name="name" value=""><br/>
        * Vendor :  <select name="vendor">
                    <option value="Uniform">Uniform (co.za)</option>
                    <option value="Opensrs">OpenSRS (other)</option>
                 </select><br/>
                 <input id="addproductsubmit" type="submit" value="Create">
                 <p></p>
        <br/>
        Press ESCAPE, Click on X (right-top) or Click Out from the popup to close the popup!
        
        </form>
        </div>
        <div id="backgroundPopup"></div>
        
        
    </body>
</html>
