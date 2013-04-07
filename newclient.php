<!--
    this allows us to create new clients
-->
<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="/css/general.css"/>
        <script type ="text/javascript" src="scripts/jquery-1.9.1.js"></script>
        <script type ="text/javascript" src="scripts/jquery.validate.js"></script>
        <script type="text/javascript" src="client_scripts/addclientprofile.js"></script>
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
                        
                        <label for="firstname">First Name: </label><em>*</em>
                        <input type="text" name="firstname" id="firstname" minlength="2"><br/>
                        <label for="lastname">Last Name: </label><em>*</em>
                        <input type="text" name="lastname" id="lastname" minlength="2"><br/>
                        <label for="email">Email Address: </label><em>*</em>
                        <input type="text" name="email" id="email" minlength="7"><br/>
                        
                        
                        
                        <input id="addsubmit" type="submit" value="Create">
                        <p></p>

                    </form>

                </div>
                </div>
            </div>
        </div>
        
        
        
    </body>
</html>
