/* 
 *This file is linked to clientprofile,
 *used to change behaviour of clientprofile page
 */



//check if clientprofile page has any changes

$(document).ready( function(){
    //variable to see if form has changed
    var FORM_HAS_CHANGED = false;
    
    //hide submit button after load
    $('#contactformsubmit').hide();
    
    //set varailbe to to if changes occur
    $('#contactdetailsform').change(function(event) {
        FORM_HAS_CHANGED = true;//set to true because form changed
        //show submit button after load
        $('#contactformsubmit').show();
        
        //save reminded message
        $('#contactdetails p').html("Not Saved!");
            
        //change colour of div
        $('#contactdetails').css('background-color', '#FF6666');
    });

    //modify submit action
    $('#contactdetailsform').submit(function(event) {
        // stop form from submitting normally 
        event.preventDefault();        
        
        //check if changes has been made
        if(FORM_HAS_CHANGED){
            
            //get the client id from the url
            var $get_id = document.location.toString();
            $get_id = $get_id.substr($get_id.indexOf("id"),4);//will be used to GET id for profile save
                    
            //there is no changes so now we want to save
            var $posting = $.post('scripts/save_client_profile.php?' + $get_id,$('#contactdetailsform').serialize() , function() {
            
            //set form change variable to false
            FORM_HAS_CHANGED = false;
            //hide submit button after load
            $('#contactformsubmit').hide(); 
            
            //add saved message to div contactdetails
            $('#contactdetails p').html("Saved");
            
            //change colour of div
            $('#contactdetails').css('background-color', '#33FF99')
            
          })
      
          .fail(function() { 
      
            //notify of error during post
            //notify of error during post
            //add failed message to div contactdetails
            $('#contactdetails p').html("Failed to save, try again!");
            
            //change colour of div
            $('#contactdetails').css('background-color', '#FF6666'); 
        });
        
      }

    });

    //prevent default for hyperlinks
    $('a').click(function(){
        //check if changes has been made
        if(FORM_HAS_CHANGED){
            //prompt user to save
            var r=confirm("Are you sure?\nIf you say OK, changes will be lost!");
            if (r==false)
              {
                  //don't leave allow to save
                  return false;
              }
        }
    });
    
    
});

        
        

    


            
  



            
  


