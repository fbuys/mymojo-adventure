/* 
 *This file is linked to clientprofile,
 *used to change behaviour of clientprofile page
 */



//check if clientprofile page has any changes

$(document).ready( function(){
    $('.cancel_icon').click(function(event){
        //first ask user if they are sure to cancel
        var r=confirm("Are you sure?\nIf you say OK, the product will be cancelled");
            if (r===true) //user is sure
            {
                    //get the product id
                    $get_id = $(this).closest('tr').attr('id');//will be used to GET id for profile save

                    //there is changes so now we want to save
                    var $getting = $.get('scripts/cancel_product.php', { id: $get_id }, function() {
                    //remove row from table
                    $('#'+$get_id).hide('slow');                    

                    })
                    .fail(function() { 
      
                    //notify of error during cancellation
                    alert("The product failed to be cancelled from database!\nAssistance required!");
                    
                });
                  
            }
            
    });

    $('.add_icon').click(function(event){
        
    });
    
    
});

        
        

    


            
  



            
  


