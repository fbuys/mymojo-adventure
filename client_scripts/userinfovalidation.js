/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function formSubmit() {
        console.log("it works!")
        return false;

    }

$(document).ready( function(){
    $("#contactdetailsform").validate({
        //debug: true,
        submitHandler: formSubmit,
        //invalidHandler: alert('invalid'),
        rules: {
            name: {
                required: true,
                firstnames: true
                
            }
        },
        messages: {
            name: {
                firstnames: "Must be a name",
                required: "Required!"
            }
        
        },
        errorLabelContainer: "#errorContainer",
        success: function(label) {
            label.addClass("valid").text("Ok!");
            label.closest("label").css('color', '#66FF66'); 
        },
        highlight: function(element, errorClass) {
            $(".error").css('color', '#FF6666'); 
            $(element).fadeOut(function() {
                $(element).fadeIn();
            });
        }
    });
});

    
