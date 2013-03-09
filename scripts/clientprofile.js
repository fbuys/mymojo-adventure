/* 
 *This file is linked to clientprofile,
 *used to change behaviour of clientprofile page
 */



//check if clientprofile page has any changes

$(document).ready( function(){
    //check for save before exit.
    $(window).unload(function(){
        prompt("Bye.");
    });
    //variable to see if form has changed
    var FORM_HAS_CHANGED = false;
    //hide submit button after load
    $('#contactformsubmit').hide();
    $('#contactdetailsfrom').change(function() {
        FORM_HAS_CHANGED = true;//set to true because form changed
        //show submit button after load
        $('#contactformsubmit').show();
    });

    //bind submit event to form
    $("#contactdetailsfrom").on("submit", function(event) {
    event.submit();
    });
    
    $('#contactdetailsfrom').submit(function() {
        
        /* stop form from submitting normally */
        event.preventDefault();
        //check if changes has been made
        if(FORM_HAS_CHANGED){
            //get the client id from the url
            var $get_id = document.location.toString();
            $get_id = $get_id.substr($get_id.indexOf("id"),4);//will be used to GET id for profile save
                    
            //there is no changes so now we want to save
            var $posting = $.post('scripts/save_client_profile.php?' + $get_id,$('#contactdetailsfrom').serialize() , function() {
            alert("Saved");
            
            //set form change variable to false
            FORM_HAS_CHANGED = false;
            //hide submit button after load
            $('#contactformsubmit').hide();
          })
          .fail(function() { alert("error during save."); })
                     
        }
               
    });

    
    
});

    


            
  



            
  


