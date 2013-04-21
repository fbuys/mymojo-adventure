
//global variable for changes
var FORM_HAS_CHANGED = false;

//functiono to call when form is submitted
//modify submit action
    function formSubmit() {      
        
        //check if changes has been made
        if(FORM_HAS_CHANGED){
                    
            //there is no changes so now we want to save
            var $posting = $.post('client_scripts/add_client_profile.php',$('#contactdetailsform').serialize() , function(data) {
            
            //console.log(data);
                if( data !== 0)
                {
                    //set form change variable to false
                    FORM_HAS_CHANGED = false;
                    //hide submit button after load
                    $('#addsubmit').hide(); 

                    //add saved message to div contactdetails
                    $('#contactdetails p').html("Saved");

                    //change colour of div
                    $('#contactdetails').css('background-color', '#33FF99')

                    //reset the form
                    $('#contactdetailsform')[0].reset();

                    //redirect to new client page
                    window.location = "../clientprofile.php?id="+data;
                }
                else
                {
                    //add saved message to div contactdetails
                    $('#contactdetails p').html("Client Already Exists!");
                }
            })
      
          .fail(function() { 
      
            //notify of error during post
            //notify of error during post
            //add failed message to div contactdetails
            $('#contactdetails p').html("Failed to save, try again!");
            
            //change colour of div
            $('#contactdetails').css('background-color', '#ffb147'); 
        });
        
      }

    }



//check if clientprofile page has any changes

$(document).ready( function(){
    
    //hide submit button after load
    $('#addsubmit').hide();
    
    //set varailbe to to if changes occur
    $('#contactdetailsform').change(function(event) {
        FORM_HAS_CHANGED = true;//set to true because form changed
        //show submit button after load
        $('#addsubmit').show();
        
        //save reminded message
        $('#contactdetails p').html("Not Saved!");
            
        //change colour of div
        $('#contactdetails').css('background-color', '#ffb147');
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

    $("#contactdetailsform").validate({
        //debug: true,
        submitHandler: formSubmit,
        //invalidHandler: alert('invalid'),
        rules: {
            firstname: {
                required: true,
                firstnames: true
                
            },
            lastname: {
                required: true,
                firstnames: true
                
            },
            email: {
                required: true,
                email: true
                
            }
        },
        messages: {
            firstname: {
                firstnames: "Must be a name",
                required: "Required!"
            },
            lastname: {
                firstnames: "Must be a name",
                required: "Required!"
            }
        
        },
        success: function(label) {
            label.addClass("valid").text("Ok!");
        },
        highlight: function(element, errorClass) { 
            $(element).fadeOut(function() {
                $(element).fadeIn();
            });
        }
    });
    
    
});

        
        

    


            
  



            
  


