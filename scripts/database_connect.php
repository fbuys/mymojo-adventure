<?php

    //require app config file
    require_once 'app_config.php';

    //connect to host
    mysql_connect(DATABASE_HOST, DATABASE_USERNAME)
            or die ("<p> Error connecting to database: ".  mysql_error(). "</p>");
    //echo "<p>Connected to MySQL!</p>";
    
    //connect to database 
    mysql_select_db(DATABASE_NAME)
        or die("<p> Error connecting to database mymojo: ".  mysql_error(). "</p>");
    //echo "<p>Connected to MySQL, using database mymojo"

?>
