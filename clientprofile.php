<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="/css/general.css"/>
        <script type ="text/javascript" src="scripts/jquery-1.9.1.js"></script>
        <script type ="text/javascript" src="scripts/jquery.validate.js"></script>
        <script type="text/javascript" src="client_scripts/clientprofile.js"></script>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MyMojo-clientprofile</title>
    </head>
    <body>
        <div id="header-wrapper">
            <!--heading + logo-->
            <div id="header" class="container">
                <div id="logo">
                <h1><a href="#">Afrihost - MyMojo</a></h1>
                </div>
            

                <!--toolbar -->
                <div id="menu">
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="newclient.php">New</a>
                        </li> 
                        <li class="active">
                            <a href="#">Contact Details</a>
                        </li>
                        <li>
                            <?php
                            echo "<a href=\"clientproduct.php?id=".$_GET['id']."\">Product Details</a>";
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    <div id="page-wrapper">
        <div id="page" class="container">
            <div id="content" class="contactdetails">
                <div id="contactdetails">
                    <header>Client Contact Details</header>
                    <form id ="contactdetailsform">
                        <?php
                            //link to database
                            require 'scripts/database_connect.php';
                            //create sql query using GET / url
                            $client_id = $_GET['id']; //get client id
                            $client_data = mysql_query("SELECT * FROM client_contact WHERE id={$client_id} ");
                            $client_data = mysql_fetch_array( $client_data );

                            echo "<label for='firstname'>First Name: </label><em>*</em>";
                            echo "<input type=\"text\" name=\"firstname\" id=\"firstname\" minlength=\"2\" value=\"".$client_data['first_name']."\"/><br/>";
                            echo "<label for=\"lastname\">Last Name: </label><em>*</em>";
                            echo "<input type=\"text\" name=\"lastname\" id=\"lastname\" minlength=\"2\" value=\"".$client_data['last_name']."\"/><br/>";
                            echo "<label for=\"email\">Email Address: </label><em>*</em>";
                            echo "<input type='text' name='email' id=\"email\" minlength=\"7\" value='".$client_data['username']."'\><br/>";

                        ?>
                        
                        <input id="contactformsubmit"type="submit" value="Save">
                        <p></p>

                    </form>

                </div>
                </div>
            </div>
        </div>
            
        
        <!--Contact Details Form-->
        
        
        
    </body>
</html>
