
			$(document).ready(function() {
				var dataTable = $('#all_owners').DataTable( {
				
				
					 "sDom": 'T<"clear">lfrtip',
        
        
"oTableTools": {
"sRowSelect": "single",
 "aButtons": [ "print" ],
"fnRowSelected": function(node) {
    var row = $(node).find('td');
    //all cells
    $.each(row, function(index, td) {
        //console.log($(td).text());
        // alert($(td).text() );


      

        
        /*
      
       
         document.getElementById("uids").value ="";

         document.getElementById("drgss").value ="";
        document.getElementById("curr").value ="";
        document.getElementById("quant").value = "";
   
        
       
       document.getElementById("uids").value =  $(row[0]).text();

        document.getElementById("drgss").value =  $(row[2]).text();
        document.getElementById("curr").value =  $(row[4]).text();
        document.getElementById("quant").value =  $(row[4]).text();
      
      




 
        
        $("#main_mod").addClass("fade").modal("show");*/
       
        
    });//end each row

  //  console.log("Specific cell content: " + $(row[2]).text());

}


},//end tabletools










				
				
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"properties/owner.php", // json datasource
						type: "post",  // method  , by default get
						
						error: function(){ 
						/* // error handling
							$(".editable-sample-error").html("");
							$("#editable-sample").append('<tbody class="editable-sample-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#editable-sample_processing").css("display","none");
						*/	
						                 }
						 
						
						
					       }
					
							} );
				
				/*
				
			var colvis = new $.fn.dataTable.ColVis( dataTable, {
        buttonText: 'Show/hide columns',
        activate: 'mouseover',
        exclude: [ 0 ]
    } );
    $( colvis.button() ).prependTo('th:nth-child(1)');
    */			
				
			} );
			
			
			
		
