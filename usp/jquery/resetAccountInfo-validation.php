<script language="javascript" type="text/javascript">
$(document).ready(function(){
	var form = $("#resetUserInfo");
	var registerEmail = $("#registerEmail");
	var emailInfo = $("#emailInfo");
	var currentPassword = $("#currentPassword");
	var currentPasswordInfo = $("#currentPasswordInfo");
	var newPassword = $("#newPassword");
	var newpasswordInfo = $("#newpasswordInfo");
	var renewPassword = $("#renewPassword");
	var retypepasswordInfo = $("#retypepasswordInfo");
	
	var minpassword = 5;
	var maxpassword = 10;
	
	registerEmail.blur(validateEmail);
	currentPassword.blur(validatecurrentPassword);
	newPassword.blur(validatenewPassword);
	renewPassword.blur(validaterenewPassword);
	
	
	//On Submitting
	
	
	
	
	form.submit(function(){
	if( validatecurrentPassword() & validatenewPassword() & validaterenewPassword()){
			return true;
		}else{
			return false;
		}
	});



		function validateEmail(){
	
		var a = $("#registerEmail").val();
		var s=$("#registerEmail").val();
		   var i;
           var returnString = "";
		if(s == ""){
			
			//email.addClass("error");
			emailInfo.removeClass("approved");
			emailInfo.text("Please Enter EmailId");
			emailInfo.addClass("denied");
			return false;
		}	   
    for (i = 0; i < s.length; i++)
      {   
              var c = s.charAt(i);
        if (c == " " )
		  {
		 	//email.addClass("error");
			emailInfo.text('<?=LANG_INVALID_EMAIL_ID_MSG ?>');
			emailInfo.addClass("denied");
			return false;
		 }
        }
		var filter = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		//if it's valid email
		if(filter.test(a)){
			//email.removeClass("error");
			emailInfo.text("");
			emailInfo.removeClass("denied");
			emailInfo.addClass("approved");
			return true;
		}
		else{
			//email.addClass("error");
			emailInfo.removeClass("approved");
			emailInfo.text('<?=LANG_INVALID_EMAIL_ID_MSG ?>');
			emailInfo.addClass("denied");
			return false;
			}
	}

	function validatecurrentPassword(){
	
		var oldPass = $("#currentPassword");
          var s=oldPass.val();
		   var i;
           var returnString = "";
      var cnt = 0;
     for (i = 0; i < s.length; i++)
      {   
        var c = s.charAt(i);
       	 if (c == " " )
		  {
			oldPass.addClass("error");
			currentPasswordInfo.text('<?=LANG_WHITE_SPACES_NOT_ALLOWED?>');
			currentPasswordInfo.addClass("error");
			return false;
			 }
		  }

		if(oldPass.val().length < minpassword || oldPass.val().length > maxpassword){
			oldPass.addClass("error");
			currentPasswordInfo.text('<?=LANG_PASSWORD_LENGTH_MSG?>');
			//pass1Info.text("Password should be "+minpassword+" to "+maxpassword+"  characters long.");
			currentPasswordInfo.addClass("error");
			return false;
		}
		else{
				oldPass.removeClass("error");
				currentPasswordInfo.text("");
				currentPasswordInfo.removeClass("error");
				return true;
		}
	}

	function validatenewPassword(){
	
		var newPass = $("#newPassword");
          var s=newPass.val();
		   var i;
           var returnString = "";
      var cnt = 0;
     for (i = 0; i < s.length; i++)
      {   
        var c = s.charAt(i);
       	 if (c == " " )
		  {
			newPass.addClass("error");
			newpasswordInfo.text('<?=LANG_WHITE_SPACES_NOT_ALLOWED?>');
			newpasswordInfo.addClass("error");
			return false;
			 }
		  }

		if(newPass.val().length < minpassword || newPass.val().length > maxpassword){
			newPass.addClass("error");
			newpasswordInfo.text('<?=LANG_PASSWORD_LENGTH_MSG?>');
			//pass1Info.text("Password should be "+minpassword+" to "+maxpassword+"  characters long.");
			newpasswordInfo.addClass("error");
			return false;
		}
		//it's valid
		else{		
				newPass.removeClass("error");
				newpasswordInfo.text("");
				newpasswordInfo.removeClass("error");
				return true;
		  }
	}
	
	
	
	function validaterenewPassword(){
			var pass1 = $("#newPassword");
		var pass2 = $("#renewPassword");
		if( pass1.val() != pass2.val() ){
			renewPassword.addClass("error");
			retypepasswordInfo.text('<?=LANG_CONFIRM_PASSWORD_MSG?>');
			retypepasswordInfo.addClass("error");
			return false;
		}else{
			renewPassword.removeClass("error");
			retypepasswordInfo.text("");
			retypepasswordInfo.removeClass("error");
			return true;
		}
	}



function is_numeric(value){
			return !isNaN(value);
			}

});

</script>