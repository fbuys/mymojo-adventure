/* 
 *This file is linked to clientprofile,
 *used to change behaviour of clientprofile page
 */



//check if clientprofile page has any changes

$(document).ready( function(){
    //variable to see if form has changed
    var FORM_HAS_CHANGED = false;
    $('#contactdetailsfrom').change(function() {
        FORM_HAS_CHANGED = true;//set to true because form changed
    });
    
    $('#contactdetailsfrom').submit(function() {
        alert((document.location));
        /* stop form from submitting normally */
        event.preventDefault();
        //check if changes has been made
        if(FORM_HAS_CHANGED){
            //there is no changes so now we want to save
            var $posting = $.post('scripts/save_client_profile.php',$('#contactdetailsfrom').serialize() , function() {
            alert("Saved");
          })
          .fail(function() { alert("error during save."); })
                     
        }
               
    });
    
});


            
  



            
  


