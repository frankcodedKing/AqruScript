function lin(){
	var e = _("email").value;
	var p = _("password").value;
	var status = _("err");
	if(e == "" || p == "" ){
	    status.style.display = "block";
		status.innerHTML = "All fields are required";
	} else{
		var ajax = ajaxObj("POST", "functions/lginf.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true ) {
			    if(ajax.responseText == "wrong"){
					 status.style.display = "block";
					 status.innerHTML = "Email and password field required";
				}else if(ajax.responseText == "bad_login"){
					 status.style.display = "block";
					 status.innerHTML = "Log in details are not correct";
				}else if(ajax.responseText == "success"){
				     window.location.href = "dashboard";
				} 
	        }
			}
        ajax.send("email="+e+"&password="+p);
	}
}


function passreset(){
	var n = _("newpass").value;
	var c = _("comfirmpass").value;
	var t = _("token").value;
	var status = _("err");
	if(n == "" || c == "" ){
	    status.style.display = "block";
		status.innerHTML = "All fields are required";
	} else{
		var ajax = ajaxObj("POST", "functions/resetpassword.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true ) {
			    if(ajax.responseText == "wrong"){
					 status.style.display = "block";
					 status.innerHTML = "Password do no match";
				}else if(ajax.responseText == "okay"){
				     window.location.href = "login";
				} 
	        }
			}
        ajax.send("newpass="+n+"&comfirmpass="+c+"&token="+t);
	}
}



