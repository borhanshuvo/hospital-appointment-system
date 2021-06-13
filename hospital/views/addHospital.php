<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../index.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-60);
		header("Location:../index.php");
	}

	include '../controllers/hospital_Controller.php';
	$hospitals=getAllHospital();
	$s_email = $_SESSION['s_email'];

	include '../controllers/super_admin_Profile_Controller.php';
	$super_admins=getAllSuperAdmin();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Add Hospital</title>
	<link rel="stylesheet" type="text/css" href="css/admin_signup.css">
	<link rel="stylesheet" type="text/css" href="css/super_admin_style.css">
	<link rel="icon" href="img/hospital.png" sizes="16x16" type="image/png">

	<script>
		function validate_form()
		{

			var valid = true;
			document.getElementById("err_hname").innerHTML = "";
			var h_name=document.forms["myForm"]["h_name"].value;

			document.getElementById("err_des").innerHTML = "";
			var des=document.forms["myForm"]["des"].value;

			document.getElementById("err_phone_no").innerHTML = "";
			var phone_no=document.forms["myForm"]["phone_no"].value;

			document.getElementById("err_email").innerHTML = "";
			var email=document.forms["myForm"]["email"].value;

			document.getElementById("err_address").innerHTML = "";
			var address=document.forms["myForm"]["address"].value;
			
			if(h_name == "" || h_name == null)
			{
				
				document.getElementById("err_hname").innerHTML="Hospital Name Required";
				valid = false;
			}
			else if(!isNaN(h_name))
			{
				
				document.getElementById("err_hname").innerHTML="You Cannot Input Numeric Value";
				valid = false;
			}
			if(des == "" || des == null)
			{
				
				document.getElementById("err_des").innerHTML="Hospital Description Required";
				valid = false;
			}
			else if(!isNaN(des))
			{
				
				document.getElementById("err_des").innerHTML="You Cannot Input Numeric Value";
				valid = false;
			}
			if(phone_no == "" || phone_no == null)
			{
				
				document.getElementById("err_phone_no").innerHTML="Phone Number Required";
				valid = false;
			}
			else if(isNaN(phone_no))
			{
				document.getElementById("err_phone_no").innerHTML="Phone Number Must Be Numeric Value";
				valid = false;
			}
			else if(phone_no.length<11)
			{
				document.getElementById("err_phone_no").innerHTML="Phone Number Too Short";
				valid = false;
			}
			if(email == "" || email == null)
			{
				
				document.getElementById("err_email").innerHTML="Email Address Required";
				valid = false;
			}
			if(address== "" || address == null)
			{
				
				document.getElementById("err_address").innerHTML="Hospital Address Required";
				valid = false;
			}
			else if(!isNaN(address))
			{
				
				document.getElementById("err_address").innerHTML="You Cannot Input Numeric Value";
				valid = false;
			}
			return valid;
		}
	</script>
</head>
<body>
	<section>	
		<nav class="navber">
		<h1>
			<span class="logo-text">
				<?php 
					foreach ($super_admins as $super_admin)
					{
						$v_email = $super_admin["email"];
						//echo $v_email;
						if($v_email == $s_email)
						{
							echo $super_admin['f_name'].' '.$super_admin['l_name'];
						}
					}
				 ?>
			</span>
		</h1>
		
		<ul>
			<li> <a href="super_admin.php">Dashboard</a></li>
			<li class="dropdown">
    				<a href="#">Hospital</a>
	    			<div class="dropdown-content">
	      				<a href="addHospital.php">Add Hospital</a>
	      				<a href="s_listHospital.php">Hospital List</a>
	    			</div>
			</li>
			<li class="dropdown">
    				<a href="#">Admin</a>
	    			<div class="dropdown-content">
	      				<a href="addAdmin.php">Add Admin</a>
	      				<a href="s_listAdmin.php">Admin List</a>
	    			</div>
			</li>
			<li class="dropdown">
    				<a href="#">Department</a>
	    			<div class="dropdown-content">
	      				<a href="s_listDepartment.php">Department List</a>
	    			</div>
			</li>
			<li class="dropdown">
    				<a href="#">Doctor</a>
	    			<div class="dropdown-content">
	      				<a href="s_listDoctor.php">Doctor List</a>
	    			</div>
			</li>
			<li class="dropdown">
    				<a href="#">Patient</a>
	    			<div class="dropdown-content">
	      				<a href="s_listPatient.php">Patient List</a>
	    			</div>
			</li>
			<li> <a href="super_adminProfile.php">Profile</a></li>
			<li>
				<form method="post" action="">
				<input type="submit" value="Log out" name="logout" class="bn">
				</form>
			</li>
		</ul>
	</nav>
	</section>
	<?php 
	/*$err_h_name="";
	$h_name="";
	$des="";
	$err_des="";
	$email="";
	$err_email="";
	$phone_no="";
	$err_phone_no="";
	$address="";
	$err_address="";
	$has_error=false;

	

	if(isset($_POST['submit']))
		{
			if(empty($_POST['h_name']))
			{
				$err_h_name="Hospital Name Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['h_name']))
				{
					$err_h_name="You Can Input Only latter";
					$has_error=true;
					$h_name=htmlspecialchars($_POST['h_name']);
				}
				else
				{
					$h_name=htmlspecialchars($_POST['h_name']);
					$_SESSION['h_name'] = $h_name;
				}
			}
			if(empty($_POST['des']))
			{
				$err_des="Hospital Description Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['des']))
				{
					$err_des="You Can Input Only latter";
					$has_error=true;
					$des=htmlspecialchars($_POST['des']);
				}
				else
				{
					$des=htmlspecialchars($_POST['des']);
					$_SESSION['des'] = $des;
				}
			}
			if(empty($_POST['email']))
			{
				$err_email="Email Address Required";
				$has_error=true;
			}
			else
			{			
				foreach($hospitals as $hospital)
				{
					$v_id = $hospital["id"];
					$v_email = $hospital["email"];
					if($v_email == $_POST['email'])
					{
						$err_email="Already Use This Email";
						$has_error=true;
						$email=htmlspecialchars($_POST['email']);
					}
					else
					{
						$email=htmlspecialchars($_POST['email']);
						$_SESSION['email'] = $email;
					}
				}
			}

			if(empty($_POST['phone_no']))
			{
				$err_phone_no="Phone Number Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[0-9]*$/", $_POST['phone_no']))
				{
					$err_phone_no="You Can Input Only Numeric Value";
					$has_error=true;
					$phone_no=htmlspecialchars($_POST['phone_no']);
				}
				else
				{
					if(strlen($_POST['phone_no']) < 11)
					{
						$err_phone_no="Mobile Number Too Short";
						$has_error=true;
						$phone_no=htmlspecialchars($_POST['phone_no']);
					}
					else
					{
						$phone_no=htmlspecialchars($_POST['phone_no']);
						$_SESSION['phone_no'] = $phone_no;
					}
				}
			}
			if(empty($_POST['address']))
			{
				$err_address="Hospital Address Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['address']))
				{
					$err_address="You Can Input Only latter";
					$has_error=true;
					$address=htmlspecialchars($_POST['address']);
				}
				else
				{
					$address=htmlspecialchars($_POST['address']);
					$_SESSION['address'] = $address;
				}
			}
			if(!$has_error)
			{
				header("Location:../controllers/hospital_Controller.php?req=add_hos");
			}
		}*/
		
 ?>
	<div class="register" >
		<h2>ADD HOSPITAL</h2><hr>
		<form id="register" method="POST" onsubmit="return validate_form()" action="../controllers/hospital_Controller.php" name="myForm">
			<table>
				<tr>
					<td>
						<label>Hospital Name</label><br>
		                <input type="text" name="h_name" placeholder="Hospital Name" class="from-control" id="h_name"> <br> <p style="color: red;" id="err_hname"> </p>
					</td>
				</tr>
				<tr>
					<td>
						<label>Hospital Description</label><br>
						<textarea type="text" class="from-control" id="des" name="des"  placeholder="Description"></textarea> <br> <p style="color: red;" id="err_des"> </p>
					</td>
				</tr>
				<tr>
					<td>
						<label>Hospital Email Address</label><br>
						<input type="email" class="from-control" name="email" id="email" placeholder="Email Address"><br> <p style="color: red;" id="err_email"> </p>
					</td>
				</tr>
				<tr>
					<td>
						<label>Hospital Mobile No</label><br>
						<input type="text" class="from-control" name="phone_no" id="phone_no" placeholder="Mobile Number"> <br> <p style="color: red;" id="err_phone_no"> </p>
					</td>
				</tr>
				<tr>
					<td>
						<label>Hospital Address</label><br>
		                <textarea type="text" class="from-control" name="address" id="address" placeholder="Address"></textarea> <br> <p style="color: red;" id="err_address"> </p>
					</td>
				</tr>
				
				<tr>
					<td colspan="3">
						<input class="btn" type="submit" id="submit" name="submit" value="Submit">
					</td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</form>
	</div>
	<section>
		<footer>
			<div class="footer">
				<a href="#">© 2020 Hospital Appointment. </a>
			</div>
		</footer>
	</section>
</body>
</html>