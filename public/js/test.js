
function addRow() {

  var self = this;

        $.ajax({
		url: 'add.php',
		type: 'POST',
		dataType: "html",
		data: {
			tablename : "expenses",
			item:  $("#item").val(),
			quantity:  $("#quantity").val()
		},
		success: function (response) 
		{ 
			if (response == "ok" ) {
   
                // hide form
                showAddForm();   
        		$("#item").val('');
                $("#quantity").val('');
			    
                alert("Row added : reload model");
                //self.fetchGrid();
           	}
            else 
              alert("error");
		},
		error: function(XMLHttpRequest, textStatus, exception) { alert("Ajax failure\n" + errortext); },
		async: true
	});

        
			
}

function showAddForm() {
  if ( $("#addform").is(':visible') ) 
      $("#addform").hide();
  else
      $("#addform").show();
}

function showUpdateForm() {
	
	if ( $("#updateform").is(':visible') ) 
		$("#updateform").hide();
	else
		$("#updateform").show();
}