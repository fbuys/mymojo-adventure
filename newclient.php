<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="/css/general.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
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
        
        <div id="contactdetails">
            <form action=".php" method="POST">
                
                First Name: <input type="text" name="firstname"><br/>
                Last Name: <input type="text" name="lastname"><br/>
                Email Address: <input type="text" name="email"><br/>
                
                <input type="submit" value="Create">
                
                
            </form>
            
        </div>
        <?php
            //link to database
            require 'scripts/database_connect.php';
        ?>
    </body>
</html>
