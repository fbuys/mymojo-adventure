/* 
 *This file is linked to clientprofile,
 *used to change behaviour of clientprofile page
 */



//check if clientprofile page has any changes

$(document).ready( function(){
    var FORM_HAS_CHANGED = false;
    $('#contactdetails').change(function() {
        FORM_HAS_CHANGED = true;
    });
    
    $('#contactdetails').submit(function() {
        if(FORM_HAS_CHANGED){
            //there is no changes
            alert("changes!");
            return false;
        }
        else{
            //there is no changes
            alert("No changes!");
            return false; 
        }         
    });
    
});


            
  



            
  


