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
            
            //save reminded message
            $('#DnsForm p').html("");

            //change colour of div
            $('#DnsForm').css('background-color', '#FFFFFF');
            
            //hide submit button after load
            $('#adddnssubmit').hide();
            
            //make li alternate colours
            $('tr:nth-child(odd)').addClass('alternate');

        })
        .fail(function() { 

        //notify of error during cancellation
        alert("The DNS table failed to load!\nAssistance required!");

        });
}

        //get the product id
        $product_id = 0;

//make sure document is ready.
$(document).ready( function(){
    //change colors of alternate tr
    //make li alternate colours
    $('tr:nth-child(odd)').addClass('alternate');
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
        //first ask user if they are sure to cancel
        var r=confirm("Are you sure?\nIf you say OK, the product will be cancelled");
            if (r===true) //user is sure
            {
                    //alert("delete dns!");
                    //get the product id
                    $get_id = $(this).closest('tr').attr('id');//will be used to GET id for profile save

                    //there is changes so now we want to save
                    var $getting = $.get('scripts/cancel_dns.php', { id: $get_id }, function() {
                    //remove row from table
                    $('#'+$get_id).hide('slow');                    

                    })
                    .fail(function() { 

                    //notify of error during cancellation
                    alert("The DNS failed to be cancelled from database!\nAssistance required!");//

                });//*/

            }

        });
        //make table inline editable
        $(document).on('click','#dnstable td', function(){
            
            //get the product id
            $get_id = $(this).closest('tr').attr('id');//will be used to GET id for profile save
//            $htmlid = $(this).attr('id');
//            $class = $(this).attr('class');
//            console.log( $get_id );
//            console.log( $htmlid );
//            console.log( $class );
//            alert($get_id);
            $('.inline').editable('scripts/edit_dns.php', {
                event: 'dblclick',//activate on dblclick
                submit: 'Save', //show save to submit data
                indicator : '<img src="images/indicator.gif">',
                tooltip   : 'Dubble click to edit...',
                name : 'data',
                submitdata : {dnsid: $get_id},
                callback : function(value, settings) {
                    
//                    $(this).html($.trim(value));
//                    alert($get_id);
                    //reload only dns div
                    loadDNSTable(); //reload table so editable get reloaded
                    console.log(this);
                    console.log(value); //submitted content
                    console.log(settings); //plugin settings
                    
                }
            });
            $('.inlinetype').editable('scripts/edit_dns.php', {
                event: 'dblclick',//activate on dblclick
                submit: 'Save', //show save to submit data
                indicator : '<img src="images/indicator.gif">',
                tooltip   : 'Dubble click to edit...',
                name : 'data',
                //data   : " {'SOA':'SOA','A':'A','MX':'MX','CNAME':'CNAME','NS':'NS','PTR':'PTR','TXT':'TXT','WRK':'WRK','SRV':'SRV' 'selected':'A'}",
                data   : " {'SOA':'SOA','A':'A','MX':'MX','CNAME':'CNAME','NS':'NS','PTR':'PTR','TXT':'TXT','WRK':'WRK','SRV':'SRV' , 'selected':'A'}",
                type   : 'select',
                submitdata : {dnsid: $get_id},
                callback : function(value, settings) {
                    
//                    $(this).html($.trim(value));
//                    alert($get_id);
                    //reload only dns div
                    loadDNSTable(); //reload table so editable get reloaded
                    console.log(this);
                    console.log(value); //submitted content
                    console.log(settings); //plugin settings
                    
                }
            });
            
        });
        
    
    });
        
        /*fing awesome way to convert table row to array
        $target = "#"+$get_id+" td";
        $("#"+$get_id+" td").each(function( index ) {
        console.log( index + ": " + $(this).text() );
        });*/
    

    
        

        
        

    


            
  



            
  


