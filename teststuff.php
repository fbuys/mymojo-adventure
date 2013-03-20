<!DOCTYPE html>
<html>
    <head>
  <meta charset="utf-8">
  <title>autocomplete demo</title>
  <link rel="stylesheet" href="css/jquery-ui.css">
  <script type ="text/javascript" src="scripts/jquery-1.9.1.js"></script>
  <script type ="text/javascript" src="scripts/jquery-ui-1.10.2"></script>
  <script type ="text/javascript" src="scripts/indexsearch.js"></script>
  <style>
	.ui-autocomplete-loading {
		background: white url('images/indicator.gif') right center no-repeat;
	}
        </style>
</head>
<body>
 
    <div id="search">
            <form action= "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                
                <label for="autocomplete">Search: </label>
                <input type="text" name="find" id="autocomplete"/></br>
                <input type="radio" name="search_field" value="first_name">First Name
                <input type="radio" name="search_field" value="last_name">Last Name
                <input type="radio" name="search_field" value="username" checked>Email
                <input type="radio" name="search_field" value="product">Product
                <br/>
                <input type="hidden" name="searching" value="true" />
                <input type="submit" value="Search">
            </form>
            
        </div>
    
    <?php
            //link to database
            require 'scripts/database_connect.php';
            
            $searcing = $_POST['searching']; //did user submit form
            $find = $_POST['find']; //what is the user looking for
            $search_field = $_POST['search_field']; //what field to search in
            
            //This is only displayed if they have submitted the form 
            if ( $searcing ) 
            { 
            echo "<h2>Results</h2><p>"; 

                //If they did not enter a search term we give them an error 
                if ($find == "") 
                { 
                    echo "<p>You forgot to enter a search term </p>"; 
                    exit(""); 
                } 

            //preform a bit of filtering 
            $find_filter = strtoupper($find); //to match all cases
            $find_filter = strip_tags($find); //removes code from search box
            $find_filter = trim ($find); //remove white spaces

            //Now we search for our search term, in the field the user specified 
            $data = mysql_query("SELECT * FROM client_contact WHERE {$search_field} LIKE'%$find_filter%'"); 

            //show user how many results we have
            echo mysql_num_rows($data)." result(s) match the criteria you provided <br/><br/>"; 
            //And we display the results 
            while($result = mysql_fetch_array( $data )) 
            { 
                echo "<a href=clientprofile.php?id={$result['id']} > <img id='icon' src='/images/go_profile.png'/>  </a>";
                echo $result['first_name']; 
                echo " "; 
                echo $result['last_name'] . " - ";
                echo $result['username']; 
                echo "<br>"; 
                echo "<br>"; 
            } 

            //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
            $anymatches=mysql_num_rows($data); 
            if ($anymatches == 0) 
            { 
            echo "Sorry, but we can not find an entry to match your query<br><br>"; 
            } 

            //And we remind them what they searched for 
            echo "<b>Searched For:</b> " .$find; 
            } 
        ?>
 

 
</body>
</html>