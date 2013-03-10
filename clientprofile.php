<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="/css/general.css"/>
        <script type ="text/javascript" src="scripts/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="scripts/clientprofile.js"></script>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MyMojo-clientprofile</title>
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
                    echo "<a href=\"clientproduct.php?id=".$_GET['id']."\">Product Details</a>";
                    ?>
                </li>
            </ul>
        </div>
        
        <!--Contact Details Form-->
        <div id="contactdetails">
            <form id ="contactdetailsfrom">
                
                <?php
                    //link to database
                    require 'scripts/database_connect.php';
                    //create sql query using GET / url
                    $client_id = $_GET['id']; //get client id
                    $client_data = mysql_query("SELECT * FROM client_contact WHERE id={$client_id} ");
                    $client_data = mysql_fetch_array( $client_data );
                
                
                    echo "First Name: <input type=\"text\" name=\"firstname\" value=\"".$client_data['first_name']."\"/><br/>";
                    echo "Last Name: <input type=\"text\" name=\"lastname\" value=\"".$client_data['last_name']."\"/><br/>";
                    echo "Email Address: <input type='text' name='email' value='".$client_data['username']."'\><br/>";
                    
                    
                ?>
                
                <input id="contactformsubmit"type="submit" value="Save">
                
            </form>
                 
             
        </div>
        
        
    </body>
</html>
