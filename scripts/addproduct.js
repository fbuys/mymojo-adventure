//setting up our popup!!
//0 means disabled; 1 means enabled;
var $popupStatus = 0;

        //variable to see if form has changed
        var FORM_HAS_CHANGED = false;

//loading popup with jQuery magic!
function loadPopup(){
    //loads popup only if it is disabled
    if($popupStatus===0){
        $("#backgroundPopup").css({
        "opacity": "0.7"
        });
    $("#backgroundPopup").fadeIn("slow");
    $("#popupNewProduct").fadeIn("slow");
        $popupStatus = 1;
    }
}

//disabling popup with jQuery magic!
function disablePopup(){
    //disables popup only if it is enabled
    if($popupStatus==1){
    $("#backgroundPopup").fadeOut("slow");
    $("#popupNewProduct").fadeOut("slow");
        $popupStatus = 0;
    }
}

//centering popup
function centerPopup(){
    //request data for centering
    var windowWidth = document.documentElement.clientWidth;
    var windowHeight = document.documentElement.clientHeight;
    var popupHeight = $("#popupNewProduct").height();
    var popupWidth = $("#popupNewProduct").width();
    //centering
    $("#popupNewProduct").css({
    "position": "absolute",
    "top": windowHeight/2-popupHeight/2,
    "left": windowWidth/2-popupWidth/2
    });
    //only need force for IE6

    $("#backgroundPopup").css({
    "height": windowHeight
    });

}

//make sure document is ready.
$(document).ready( function(){
    $('.add_icon').click(function(event){
        console.log("icon clicked");
        //centering with css
        centerPopup();
        //load popup
        loadPopup();
        });

        //CLOSING POPUP
        //Click the x event!
        $("#popupProductClose").click(function(){
            disablePopup();
        });
        //Click out event!
        $("#backgroundPopup").click(function(){
            disablePopup();
        });
        //Press Escape event!
        $(document).keypress(function(e){
            if(e.keyCode===27 && $popupStatus===1){
                disablePopup();
            }
        });
    
        //hide submit button after load
        //$('#addproductsubmit').hide();
        
        //set varailbe to to if changes occur
        $('#productForm').change(function(event) {
            FORM_HAS_CHANGED = true;//set to true because form changed
            //show submit button after load
            //$('#addproductsubmit').show();

            //save reminded message
            $('#productForm p').html("Not Saved!");

            //change colour of div
            $('#productForm').css('background-color', '#FF6666');
            
            
        });
    
        //modify submit action
    $('#productForm').submit(function(event) {
        // stop form from submitting normally 
        event.preventDefault();        
        
        //check if changes has been made
        if(FORM_HAS_CHANGED){
            
            //get the client id from the url
            var $get_id = document.location.toString();
            $get_id = $get_id.substr($get_id.indexOf("id"),4);//will be used to GET id for profile save
                    
            //there is no changes so now we want to save
            var $posting = $.post('scripts/add_product.php?' + $get_id,$('#productForm').serialize() , function(data) {
            
            if(data != 0)
            {
                //set form change variable to false
                FORM_HAS_CHANGED = false;
                //hide submit button after load
                //$('#addproductsubmit').hide(); 

                //add saved message to div contactdetails
                $('#productForm p').html("Saved!");

                //change colour of div
                $('#productForm').css('background-color', '#33FF99')

                //remove popup
                disablePopup();
                
                //reload page
                //document.location.reload();
                window.location.href = window.location.href; //best way to reload so firfox understands
            }
            else
            {
                //add saved message to div contactdetails
                $('#productForm p').html("Product Already Exists!");
            }
            
          })
      
          .fail(function() { 
      
            //notify of error during post
            //notify of error during post
            //add failed message to div contactdetails
            $('#productForm p').html("Failed to add, try again!");
            
            //change colour of div
            $('#productForm').css('background-color', '#FF6666'); 
        });
        
      }

    });
            
            
    
});



        
        

    


            
  



            
  


