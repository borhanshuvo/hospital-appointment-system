<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script type="text/javascript">

function checkName()
{
    if (document.getElementById("name").value == "")
    {
        document.getElementById("err_name").innerHTML = "Name Required";
        document.getElementById("err_name").style.color = "red";
        document.getElementById("name").style.borderColor = "red";
    }
    else if(!isNaN(document.getElementById("name").value))
    {
        
        document.getElementById("err_name").innerHTML="Numeric Value cannot be given";
        document.getElementById("err_name").style.color = "red";
        document.getElementById("name").style.borderColor = "red";
    }
    else
    {
        document.getElementById("err_name").innerHTML = "";
        document.getElementById("name").style.borderColor = "black";
    } 
}

function checkFirstName()
{
    if (document.getElementById("f_name").value == "")
    {
        document.getElementById("err_f_name").innerHTML = "Name Required";
        document.getElementById("err_f_name").style.color = "red";
        document.getElementById("f_name").style.borderColor = "red";
    }
    else if(!isNaN(document.getElementById("f_name").value))
    {
        
        document.getElementById("err_f_name").innerHTML="Numeric Value cannot be given";
        document.getElementById("err_f_name").style.color = "red";
        document.getElementById("f_name").style.borderColor = "red";
    }
    else
    {
        document.getElementById("err_f_name").innerHTML = "";
        document.getElementById("f_name").style.borderColor = "black";
    } 
}

function checkLastName()
{
    if (document.getElementById("l_name").value == "")
    {
        document.getElementById("err_l_name").innerHTML = "Name Required";
        document.getElementById("err_l_name").style.color = "red";
        document.getElementById("l_name").style.borderColor = "red";
    }
    else if(!isNaN(document.getElementById("l_name").value))
    {
        
        document.getElementById("err_l_name").innerHTML="Numeric Value cannot be given";
        document.getElementById("err_l_name").style.color = "red";
        document.getElementById("l_name").style.borderColor = "red";
    }
    else
    {
        document.getElementById("err_l_name").innerHTML = "";
        document.getElementById("l_name").style.borderColor = "black";
    } 
}

function checkDescription()
{
    if (document.getElementById("des").value == "")
    {
        document.getElementById("err_des").innerHTML = "Description Required";
        document.getElementById("err_des").style.color = "red";
        document.getElementById("des").style.borderColor = "red";
    }
    else
    {
        document.getElementById("err_des").innerHTML = "";
        document.getElementById("des").style.borderColor = "black";
    } 
}

function checkEmail()
{
    var email       = document.getElementById("email").value;
    var atposition  = email.indexOf("@");  
    var dotposition = email.lastIndexOf(".");

    if (document.getElementById("email").value == "")
    {
        document.getElementById("err_email").innerHTML = "Email Required";
        document.getElementById("err_email").style.color = "red";
        document.getElementById("email").style.borderColor = "red";
    }
    else if( atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length )
    {
        document.getElementById("err_email").innerHTML="Please enter a valid e-mail address";
        document.getElementById("err_email").style.color = "red";
        document.getElementById("email").style.borderColor = "red";
    }
    else
    {
        document.getElementById("err_email").innerHTML = "";
        document.getElementById("email").style.borderColor = "black";
    } 
}

function checkAddress()
{
    if (document.getElementById("address").value == "")
    {
        document.getElementById("err_address").innerHTML = "Address Required";
    }
    else
    {
        document.getElementById("err_address").innerHTML = "";
    } 
}

function checkNumber()
{
    if (document.getElementById("phone_no").value == "")
    {
        document.getElementById("err_phone_no").innerHTML = "Phone Number Required";
    }
    else if(isNaN(document.getElementById("phone_no").value))
    {
        document.getElementById("err_phone_no").innerHTML="You Can Input Only Numeric Value";
        document.getElementById("err_phone_no").style.color = "red";
        document.getElementById("phone_no").style.borderColor = "red";
    }
    else if( document.getElementById("phone_no").value.length < 11)
    {
        document.getElementById("err_phone_no").innerHTML = "Mobile number not less than 11 characters";
    }
    else if( document.getElementById("phone_no").value.length > 11)
    {
        document.getElementById("err_phone_no").innerHTML = "Mobile number not more than 11 characters";
    }
    else
    {
        document.getElementById("err_phone_no").innerHTML = "";
    } 
}

function checkPassword()
{
	var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
	var password = document.getElementById("password").value;

    if (document.getElementById("password").value == "")
    {
        document.getElementById("err_password").innerHTML = "Password Required";
    }
    else if( !format.test(password) )
    {
    	document.getElementById("err_password").innerHTML = "Password must contain at least one of the special characters";
    }
    else if( document.getElementById("password").value.length < 8)
    {
    	document.getElementById("err_password").innerHTML = "Password not be less than 8 characters";
    }
    else
    {
        document.getElementById("err_password").innerHTML = "";
    } 
}

function checkConfirmPassword()
{
    if (document.getElementById("c_password").value == "")
    {
        document.getElementById("err_c_password").innerHTML = "Confirm Password Required";
    }
    else if( document.getElementById("c_password").value != document.getElementById("password").value)
    {
    	document.getElementById("err_c_password").innerHTML = "Password & Confirm Password Not Match!!";
    }
    else
    {
        document.getElementById("err_c_password").innerHTML = "";
    } 
}

function checkGender()
{
    if (document.getElementById("gender").value == "NULL")
    {
        document.getElementById("err_gender").innerHTML = "Gender Required";
    }
    else
    {
        document.getElementById("err_gender").innerHTML = "";
    } 
}

function checkBlood()
{
    if (document.getElementById("blood").value == "NULL")
    {
        document.getElementById("err_blood").innerHTML = "Blood Group Required";
    }
    else
    {
        document.getElementById("err_blood").innerHTML = "";
    } 
}

function checkStatus()
{
    if (document.getElementById("status").value == "NULL")
    {
        document.getElementById("err_status").innerHTML = "Status Required";
    }
    else
    {
        document.getElementById("err_status").innerHTML = "";
    } 
}

function checkBirthDate()
{
	var birthDate = document.getElementById("b_date").value;
	var birthYear = birthDate.slice(0, 4);

	var today     = new Date();
	var todayYear = today.getFullYear();

	var age = todayYear - birthYear;

    if (document.getElementById("b_date").value == "")
    {
        document.getElementById("err_b_date").innerHTML = "Date Required";
    }
    else if( age < 18)
    {
    	document.getElementById("err_b_date").innerHTML = "*You are under 18 years of age";
    }
    else
    {
        document.getElementById("err_b_date").innerHTML = "";
    } 
}

function checkProfilePicture()
{
    if (document.getElementById("img").value == "")
    {
        document.getElementById("err_img").innerHTML = "Image Required";
    }
    else
    {
        document.getElementById("err_img").innerHTML = "";
    } 
}

function passwordShow()
{
	var value = document.getElementById("password");

	if (value.type === "password")
	{
		value.type = "text";
	} 
	else 
	{
		value.type = "password";
	}
}

function confirmPasswordShow()
{
	var value = document.getElementById("c_password");

	if (value.type === "password")
	{
		value.type = "text";
	} 
	else 
	{
		value.type = "password";
	}
}

function checkMessage()
{
    if (document.getElementById("message").value == "")
    {
        document.getElementById("err_message").innerHTML = "*Message Required";
        document.getElementById("err_message").style.color = "red";
        document.getElementById("message").style.borderColor = "red";
    }
    else
    {
        document.getElementById("err_message").innerHTML = "";
        document.getElementById("message").style.borderColor = "black";
    } 
}
</script>