<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="css/general.css"/>
        <script type ="text/javascript" src="scripts/jquery-1.9.1.js"></script>
        <script type ="text/javascript" src="scripts/indexsearch.js"></script>
        <!--to be used for jqueryui autocomplete
        <link type="text/css" rel="stylesheet" href="css/jquery-ui.css">
        <script type ="text/javascript" src="scripts/jquery-ui-1.10.2"></script> 
        <style>
            .ui-autocomplete-loading {
                    background: white url('images/indicator.gif') right center no-repeat;
            }
        </style>-->
        <title>MyMojo-home</title>
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
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="newclient.php">New</a>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
        
<div id="page-wrapper">
    <div id="page" class="container">
        <div id="content" class="search">
            <header>Search For a Client or Product</header>
            <div id="search">
                <form id="searchForm">

                    <input type="text" name="find" id="autocomplete"/></br>
                    <input type="radio" name="search_field" value="first_name">First Name
                    <input type="radio" name="search_field" value="last_name">Last Name
                    <input type="radio" name="search_field" value="username" checked>Email
                    <input type="radio" name="search_field" value="product">Product
                    <br/>
                    <input id="searchsubmit" type="submit" value="Search">
                </form>
            </div>
        </div>
    </div>
</div>
    <div id="searcwrapper">
        <div id="searchContainer" class="container">
            <div id="searchResults" class="container"></div>
        </div>
    </div>
        
        
    </body>
</html>
