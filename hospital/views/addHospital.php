
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Add Hospital</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="stylesheet" type="text/css" href="css/super_admin_style.css">
</head>
<body>
	<section>	
		<nav class="navber">
		<h1>
			<span class="logo-text">SUPER ADMIN
			</span>
		</h1>
		
		<ul>
			<li> <a href="super_admin.php">Home</a></li>
			<li class="dropdown">
    				<a href="#">Hospital</a>
	    			<div class="dropdown-content">
	      				<a href="addHospital.php">Add Hospital</a>
	      				<a href="s_listHospital.php">Hospital List</a>
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
			<li> <a href="../index.php">Log out</a></li>
		</ul>
	</nav>
	</section>
	<?php 
	$err_h_name="";
	$h_name="";
	$des="";
	$err_des="";
	$email="";
	$err_email="";
	$phone_no="";
	$err_phone_no="";
	$address="";
	$err_address="";


	if(isset($_POST['submit']))
		{
			if(empty($_POST['h_name']))
			{
				$err_h_name="Fill Up This";
			}
			else
			{			
				$name=htmlspecialchars($_POST['h_name']);
				echo $h_name;
			}
			if(empty($_POST['des']))
			{
				$err_des="Fill Up This";
			}
			else
			{			
				$name=htmlspecialchars($_POST['des']);
				echo $des;
			}

			if(empty($_POST['email']))
			{
				$err_email="Fill Up This";
			}
			else
			{			
				$name=htmlspecialchars($_POST['email']);
				echo $email;
			}

			if(empty($_POST['phone_no']))
			{
				$err_phone_no="Fill Up This";
			}
			else
			{			
				$name=htmlspecialchars($_POST['phone_no']);
				echo $phone_no;
			}

			if(empty($_POST['address']))
			{
				$err_address="Fill Up This";
			}
			else
			{			
				$name=htmlspecialchars($_POST['address']);
				echo $address;
			}
		}
		if(isset($_POST['reset']))
		{
			header("Location:addHospital.php");
		}
 ?>
	<div class="register" >
		<h2>ADD HOSPITAL</h2><hr>
		<form id="register" method="POST" action="../controllers/hospital_Controller.php">
			<table>
				<tr>
					<td>
						<label>Hospital Name</label><br>
		                <input type="text" name="h_name" placeholder="Hospital Name" id="name" value="<?php echo $h_name;?>"><br><span style="color:red"><?php echo $err_h_name;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Hospital Description</label><br>
						<textarea type="text" id="name" name="des" value="<?php echo $des;?>" placeholder="Description"></textarea><br>
		                <span style="color:red"><?php echo $err_des;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Hospital Email Address</label><br>
						<input type="email" name="email" id="name" placeholder="Email Address" value="<?php echo $email;?>"><br><span style="color:red"><?php echo $err_email;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Hospital Mobile No</label><br>
						<input type="number" name="phone_no" id="name" placeholder="Mobile Number" value="<?php echo $phone_no;?>"><br><span style="color:red"><?php echo $err_phone_no;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Hospital Address</label><br>
		                <textarea type="text" name="address" id="name" placeholder="Address" value="<?php echo $address;?>"></textarea><br><span style="color:red"><?php echo $err_address;?></span>
					</td>
				</tr>
				
				<tr>
					<td colspan="3">
						<input class="btn" type="submit" name="submit" value="Submit">
						<input class="btn" type="submit" name="reset" value="Reset">
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