// JavaScript Document
jQuery(function($) {
	

	$("form input[name='register']").click(function() { // triggred click
       
		/************** form validation **************/
		
		//var fname 		= jQuery.trim($("form input[name='fname']").val()); // first name field
		//var lname 		= jQuery.trim($("form input[name='lname']").val()); // last name field
		//var email 		= jQuery.trim($("form input[name='email']").val()); // email field
		//var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; // reg ex email check

	/*	if(fname == "") {
			$("span.fname_val").html("This field is empty.");
		val_holder = 1;
		}
		if(lname == "") {
			$("span.lname_val").html("This field is empty.");
		val_holder = 1;
		}
		if(email == "") {
			$("span.email_val").html("This field is empty.");
		val_holder = 1;
		}
		if(email != "") {
			if(!email_regex.test(email)){ // if invalid email
				$("span.email_val").html("Your email is invalid.");
				val_holder = 1;
			}
		}
		if(val_holder == 1) {
			return false;
		}
		
		val_holder = 0;
		/************** form validation end **************/

		/************** start: email exist function and etc. **************/
	//	$("span.loading").html("<img src='images/ajax_fb_loader.gif'>");
		//$("span.validation").html("");

		//var datastring ='email='+ email; // get data in the form manual
		//var datastring = $('form#mainform').serialize(); // or use serialize

		$.ajax({
					type: "POST", // type
					url: "check_email.php", // request file the 'check_email.php'
					data: $('form#mainform').serialize(), // post the data
					success: function(responseText) { // get the response 
					          responseText=$.trim(responseText);
						if(responseText == 1) { // if the response is 1
						alert("Email are already exist");
					
							//$("span.email_val").html("Email are already exist.");
							//$("span.loading").html("");
						} else { // else blank response
							if(responseText == 2) {
								alert("An email has sent to you");
								$("#mainform")[0].reset();
								//$("span.loading").html("You are registred.");
								//$("span.validation").html("");
								//$("form input[type='text']").val(''); // optional: empty the field after registration
							}
							else {
								alert(responseText);
							}
						
						}
					} ,// end success
					error:function(){
						alert("unable to rigister");
					}
		}); // ajax end
		/************** end: email exist function and etc. **************/
	}); // click end
}); // jquery end

