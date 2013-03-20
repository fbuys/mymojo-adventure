<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="/css/general.css"/>
        <script type ="text/javascript" src="scripts/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="scripts/addclientprofile.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
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
                        <li class="active">
                            <a href="newclient.php">New</a>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
        
        <div id="page-wrapper">
        <div id="page" class="container">
            <div id="content" class="contactdetails">
                <div id="contactdetails">
                    <header>New Client Profile</header>
                    <form id ="contactdetailsform">

                        First Name: <input type="text" name="firstname"><br/>
                        Last Name: <input type="text" name="lastname"><br/>
                        Email Address: <input type="text" name="email"><br/>
                        
                        <input id="addsubmit" type="submit" value="Create">


                    </form>

                </div>
                </div>
            </div>
        </div>
        
        
        
    </body>
</html>
