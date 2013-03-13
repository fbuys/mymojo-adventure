//setting up our popup!!

//make sure document is ready.
$(document).ready( function(){
    $('#product_tabel a').click(function(event){
        //get the product id
        $get_id = $(this).closest('tr').attr('id');//will be used to GET id for profile save
        alert("'#"+$get_id+" td'");
        
        /*fing awesome way to convert table row to array
        $target = "#"+$get_id+" td";
        $("#"+$get_id+" td").each(function( index ) {
        console.log( index + ": " + $(this).text() );
        });*/
    });
});
    
        

        
        

    


            
  



            
  


