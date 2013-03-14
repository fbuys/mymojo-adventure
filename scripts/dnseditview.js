//variable to see if form has changed
var FORM_HAS_CHANGED = false;
        
//setting up our popup!!
//0 means disabled; 1 means enabled;
var $popupStatus = 0;

//loading popup with jQuery magic!
function loadPopup(){
    //loads popup only if it is disabled
    if($popupStatus===0){
        $("#backgroundPopup").css({
        "opacity": "0.7"
        });
    $("#backgroundPopup").fadeIn("slow");
    $("#popupNewDns").fadeIn("slow");
        $popupStatus = 1;
    }
}

//disabling popup with jQuery magic!
function disablePopup(){
    //disables popup only if it is enabled
    if($popupStatus==1){
    $("#backgroundPopup").fadeOut("slow");
    $("#popupNewDns").fadeOut("slow");
        $popupStatus = 0;
    }
}

//centering popup
function centerPopup(){
    //request data for centering
    var windowWidth = document.documentElement.clientWidth;
    var windowHeight = document.documentElement.clientHeight;
    var popupHeight = $("#popupNewDns").height();
    var popupWidth = $("#popupNewDns").width();
    //centering
    $("#popupNewDns").css({
    "position": "absolute",
    "top": windowHeight/2-popupHeight/2,
    "left": windowWidth/2-popupWidth/2
    });
    //only need force for IE6

    $("#backgroundPopup").css({
    "height": windowHeight
    });

}

function loadDNSTable(){
    //we want to access the dns table associated with this product
        $.get('scripts/dns_table.php', { id: $product_id }, function(data) {
            //add dns table recently generated
            $('#dnstable').html(data);

        })
        .fail(function() { 

        //notify of error during cancellation
        alert("The product failed to be created in the database!\nAssistance required!");

        });
}

        //get the product id
        $product_id = 0;

//make sure document is ready.
$(document).ready( function(){
    $('#product_tabel a').click(function(event){
        //get the product id
        $product_id = $(this).closest('tr').attr('id');//will be used to GET id for profile save
        
        //load dns table
        loadDNSTable();
    });
    
        //event on click for add_dns_icon
        $(document).on('click','.add_dns_icon', function(){
            console.log("icon clicked");
            //centering with css
            centerPopup();
            //load popup
            loadPopup();
        });
    
        //CLOSING POPUP
        //Click the x event!
        $("#popupDnsClose").click(function(){
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
        $('#adddnssubmit').hide();
        
        //set varailbe to to if changes occur
        $('#DnsForm').change(function(event) {
            FORM_HAS_CHANGED = true;//set to true because form changed
            //show submit button after load
            $('#adddnssubmit').show();

            //save reminded message
            $('#DnsForm p').html("Not Saved!");

            //change colour of div
            $('#DnsForm').css('background-color', '#FF6666');
            
            
        });
    
        //modify submit action
    $('#DnsForm').submit(function(event) {
        // stop form from submitting normally 
        event.preventDefault();        
        
        //check if changes has been made
        if(FORM_HAS_CHANGED){
            
            //there is no changes so now we want to save
            var $posting = $.post('scripts/add_dns.php?id=' + $product_id,$('#DnsForm').serialize() , function(data) {
            
            //alert(data);
            if(data != 0)
            {
                //set form change variable to false
                FORM_HAS_CHANGED = false;
                //hide submit button after load
                $('#adddnssubmit').hide(); 

                //add saved message to div contactdetails
                $('#DnsForm p').html("Saved!");

                //change colour of div
                $('#DnsForm').css('background-color', '#33FF99')

                //remove popup
                disablePopup();
                
                //reload only dns div
                loadDNSTable();
                //reset the form
                $('#DnsForm')[0].reset();
            }
            else
            {
                //add saved message to div contactdetails
                $('#DnsForm p').html("Product Already Exists!");
            }
            
          })
      
          .fail(function() { 
      
            //notify of error during post
            //notify of error during post
            //add failed message to div contactdetails
            $('#DnsForm p').html("Failed to add, try again!");
            
            //change colour of div
            $('#DnsForm').css('background-color', '#FF6666'); 
        });
        
      }

    });
        
        //event on click for add_dns_icon
        $(document).on('click','.delete_dns_icon', function(){
            alert("delete dns!");
        });
        
        /*fing awesome way to convert table row to array
        $target = "#"+$get_id+" td";
        $("#"+$get_id+" td").each(function( index ) {
        console.log( index + ": " + $(this).text() );
        });*/
    
});
    
        

        
        

    


            
  



            
  


