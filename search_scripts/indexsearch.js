/* 
 * this adds the jquery that does the searching and alters the html on the index/search page
 */
$(document).ready(function(){
    //make li alternate colours
    $('li:nth-child(odd)').addClass('alternate');
    
    //set varaible to true if changes occur
        $('#searchForm').change(function(event) {
            FORM_HAS_CHANGED = true;//set to true because form changed           
        });
    
    
    //modify submit action
    $('#searchForm').submit(function(event) {
        // stop form from submitting normally 
        event.preventDefault();        
        
        //check if changes has been made
        if(FORM_HAS_CHANGED){
            
            //there is now changes so now we want to save
            var $posting = $.post('search_scripts/index_search_results.php', $('#searchForm').serialize() , function(data) {
                //set form change variable to false
                FORM_HAS_CHANGED = false;

                //add saved message to div contactdetails
                $('#searchResults').html(data);            
            
          })
      
          .fail(function() { 
      
            //notify of error during post
            //add failed message to div contactdetails
            $('#searchResults').html("Failed retreive any results, try again!");
            
             
          })
        }
          
    });      

});


