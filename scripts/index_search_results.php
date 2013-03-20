<?php
            //link to database
            //
            require 'database_connect.php';
            
            $find = $_POST['find']; //what is the user looking for
            $search_field = $_POST['search_field']; //what field to search in
            
            //echo var_dump($_POST);
            //echo var_dump($_GET);
            //echo var_dump($_REQUEST);
            //echo var_dump($_SERVER);
            //
            echo "<h2>Results</h2><p>"; 

                //If they did not enter a search term we give them an error 
                if ($find == "") 
                { 
                    echo "<p>You forgot to enter a search term </p>"; 
                    exit(""); 
                } 
                echo "<ul>";
            //This is only displayed if they have submitted the form 
            if ( $search_field != 'product' ) 
            { 
            

                //preform a bit of filtering 
                $find_filter = strtoupper($find); //to match all cases
                $find_filter = strip_tags($find); //removes code from search box
                $find_filter = trim ($find); //remove white spaces

                //Now we search for our search term, in the field the user specified 
                $data = mysql_query("SELECT * FROM client_contact WHERE {$search_field} LIKE'%$find_filter%'"); 

                //show user how many results we have
                echo "<p>".mysql_num_rows($data)." result(s) match the criteria you provided </p></br>";
                //And we display the results 
                while($result = mysql_fetch_array( $data )) 
                { 
                    echo "<li>";
                    echo "<a href=clientprofile.php?id={$result['id']} > <img id='icon' src='/images/go_profile.png'/>  </a>";
                    echo $result['first_name']; 
                    echo " "; 
                    echo $result['last_name'] . " - ";
                    echo $result['username']; 
                    echo "</li>";
                } 

                //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
                $anymatches=mysql_num_rows($data); 
                if ($anymatches == 0) 
                { 
                echo "<p>Sorry, but we can not find an entry to match your query</p>"; 
                } 

                //And we remind them what they searched for 
                echo "</br><p>Searched For: " .$find."</p>"; 
                } //*/
            else
            {

            //preform a bit of filtering 
            $find_filter = strtoupper($find); //to match all cases
            $find_filter = strip_tags($find); //removes code from search box
            $find_filter = trim ($find); //remove white spaces

            //Now we search for our search term, in the field the user specified 
            $products_data = mysql_query("SELECT * FROM product WHERE name LIKE'%$find_filter%'");
            
            //class to store products in
            class Product
            {
                public $product_id;
                public $client_id;
                public $product_name;
            }
            //new array variable to link products and clients
            $products_array = array(); //create an array to hold product objects
            
            //now link data to users
            while($result = mysql_fetch_array( $products_data )) 
            { 
                //search for client_id linked to products
                $client_product_data = mysql_query("SELECT * FROM client_product WHERE product_id = {$result['id']}");
                $client_product_data = mysql_fetch_array( $client_product_data );//convert to array
                $product_obj = new Product();//create a new product object
                $product_obj->product_id = $result['id']; //give object product_id
                $product_obj->product_name = $result['name']; //give object product_naem
                $product_obj->client_id = $client_product_data['client_contact_id']; //give object client_id
                array_push($products_array, $product_obj);
//                echo $product_obj->client_id;
//                echo $product_obj->product_id;
//                echo $product_obj->product_name;
                
            }
            
            //show user how many results we have
            echo "<p>".mysql_num_rows($products_data)." result(s) match the criteria you provided </p></br>"; 
            //And we display the results 
            foreach($products_array as $index=>$object)
            { 
                echo "<li>";
                echo "<a href=clientproduct.php?id={$object->client_id} > <img id='icon' src='/images/go_profile.png'/>  </a>";
                echo $object->product_name;
                echo "</li>";
            } 

            //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
            $anymatches=mysql_num_rows($products_data); 
            if ($anymatches == 0) 
            { 
            echo "Sorry, but we can not find an entry to match your query<br><br>"; 
            } 

            //And we remind them what they searched for 
            echo "</br><p>Searched For: " .$find."</p>"; 
            } //
            
            echo "</ul>";
        ?>