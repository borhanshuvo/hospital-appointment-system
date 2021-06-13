<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	require_once ('../controllers/patient_Controller.php');
	$pid = $_GET['id'];
	$patient = getPatient($pid);

	if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../index.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-60);
		header("Location:../index.php");
	}

	include_once '../controllers/login_Controller.php';
	$users=getAllUser();
	include_once '../controllers/doctor_Controller.php';
	$doctors=getAllDoctor();
	$d_email = $_SESSION['d_email'];

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>EDIT Patient</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
	<link rel="icon" href="img/hospital.png" sizes="16x16" type="image/png">
</head>
<body>
	<section>	
		<nav class="navber">
		<h1>
			<span class="logo-text">
				<?php 
					foreach ($doctors as $doctor)
					{
						$v_email = $doctor["email"];
						//echo $v_email;
						if($v_email == $d_email)
						{
							echo $doctor['f_name'].' '.$doctor['l_name'];
						}
					}
				 ?>
			</span>
		</h1>
		<ul>
			<li> <a href="#">Dashboard</a></li>
			<li>
    				<a href="d_listDepartment.php">Department</a>
			</li>
			<li>
    				<a href="d_listDoctor.php">Doctor</a>
			</li>
			<li class="dropdown">
    				<a href="#">Patient</a>
	    			<div class="dropdown-content">
	    				<a href="d_addPatient.php">Add Patient</a>
	      				<a href="d_listPatient.php">Patient List</a>
	    			</div>
			</li>
			<li class="dropdown">
    				<a href="d_appointment.php">Appointment</a>
			</li>
			<li> <a href="doctorProfile.php">Profile</a></li>
			<li>
				<form method="post" action="">
				<input type="submit" value="Log out" name="logout" class="bn">
				</form>
			</li>
		</ul>
		</nav>
	</section>
	<div class="register" >
		<h2>EDIT PATIENT</h2><hr>
		<form id="register" method="POST" action="../controllers/patient_Controller.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>
						<label>First Name</label><br>
		                <input type="text" name="f_name" id="name"  value="<?php echo $patient['f_name']?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Last Name</label><br>
		                <input type="text" name="l_name" id="name"  value="<?php echo $patient['l_name']?>">
					</td>
				</tr>
				<tr>
					<div>
						<td>
							<label>Gender</label><br>
							<select id="name" name="gender">
							<option selected value="<?php echo $patient['gender']?>"><?php echo $patient['gender']?></option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
							</select>
						</td>
					</div>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Blood Type</label><br>
						<select id="name" name="blood">
						<option selected value="<?php echo $patient['blood_type']?>"><?php echo $patient['blood_type']?></option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label>Mobile Number</label><br>
						<input type="number" name="mobile_no" id="name"  value="<?php echo $patient["mobile_no"]?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Birth Date</label><br>
						<input type="date" name="b_date" id="name" value="<?php echo $patient["birth_date"]?>">
					</td>
				</tr>
				<tr>
					<td>
						<label>Email</label><br>
						<input type="email" name="email" id="name"  value="<?php echo $patient["email"]?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Present Address</label><br>
						<input type="text" name="address" id="name"  value="<?php echo $patient["present_address"]?>">
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Permanent Address</label><br>
						<input type="text" name="address2" id="name"  value="<?php echo $patient["permanent_address"]?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>City</label><br>
						<input type="text" name="city" id="name"  value="<?php echo $patient["city"]?>">
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<label>Profile Picture</label><br>
						<img class="img" src="<?php echo $patient["picture"];?>"></img>
						<div id="name">
							<input  id="pic" type="file" name="picture">
						</div>
					</td>
					<td></td>
					<td></td>
				</tr>
				<input type="hidden" name="id" value="<?php echo $patient["id"]?>" >
				<input type="hidden" name="prev_image" value="<?php echo $patient["picture"]?>" >
				<?php
				foreach ($users as $user)
					{
				?>
				<input type="hidden" name="u_id" value="<?php echo $user["u_id"]?>" >
				<input type="hidden" name="pass" value="<?php echo $user["password"]?>" >
				<?php		
					}
				?>
				<tr>
					<td colspan="3">
						<input class="btn" type="submit" name="edit_patient" value="Edit Patient">
					</td>
					<td></td>
					<td></td>
					
				</tr>
					</td>
				
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