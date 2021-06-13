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

	$z_email = $_SESSION['z_email'];

	include_once '../controllers/login_Controller.php';
	$users=getAllUser();
	include '../controllers/patient_Controller.php';
	$patients=getAllPatient();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient - Profile</title>
	<link rel="stylesheet" type="text/css" href="css/super_admin_style.css">
	<link rel="stylesheet" type="text/css" href="css/admin_profile.css">
	<link rel="icon" href="img/hospital.png" sizes="16x16" type="image/png">
</head>
<body>
	<section>	
		<nav class="navber">
		<h1>
			<span class="logo-text">
				<?php 
					foreach ($patients as $patient)
					{
						$v_email = $patient["email"];
						//echo $v_email;
						if($v_email == $z_email)
						{
							echo $patient['f_name'].' '.$patient['l_name'];
						}
					}
				 ?>
			</span>
		</h1>
		
		<ul>
			<li> <a href="patient.php">Dashboard</a></li>
			<li>
    				<a href="p_listDoctor.php">Doctor</a>
			</li>
			<li class="dropdown">
    				<a href="#">Appointment</a>
	    			<div class="dropdown-content">
	      				<a href="addAppointment.php">Doctor Appointment</a>
	      				<a href="bookAppointment.php">Booking Appointment</a>
	    			</div>
			</li>
			<li> <a href="patientProfile.php">Profile</a></li>
			<li>
				<form method="post" action="">
				<input type="submit" value="Log out" name="logout" class="bn">
				</form>
			</li>
		</ul>
	</nav>
	</section>
	<div class="center" >
		<h2 style="text-align: center; text-transform: uppercase; letter-spacing: 2px;">Profile</h2>
		<hr>
		<table>
			<?php
			
			foreach ($patients as $patient)
					{
						$v_email = $patient["email"];
						//echo $v_email;
						if($v_email == $z_email)
						{
			?>
			<td>
				<img class="item-image" style="margin-right:20px" src="<?php echo $patient["picture"];?>"></img>
			</td>
			<td>
				<form class="form-horizontal form-material" method="POST" action="../controllers/patient_Profile_Controller.php" enctype="multipart/form-data">
				<div class="form-group">
					<label class="text">First Name</label><br>
		             <input class="form-control" type="text" name="f_name" id="name"  value="<?php echo $patient['f_name']?>">
				</div>
				<div class="form-group">
					<label class="text">Last Name</label><br>
		            <input class="form-control" type="text" name="l_name" id="name"  value="<?php echo $patient['l_name']?>">
				</div>
				<div class="form-group">
					<label class="text">Gender</label><br>
					<select class="fform-control" name="gender">
						<option selected value="<?php echo $patient['gender']?>"><?php echo $patient['gender']?></option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
					</select>
				</div>
				<div class="form-group">
					<label class="text">Blood Type</label><br>
					<select class="fform-control" name="blood">
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
				</div>
				<div class="form-group">
					<label class="text">Mobile Number</label><br>
					<input class="form-control" type="number" name="mobile_no" id="name"  value="<?php echo $patient["mobile_no"]?>">
				</div>
				<div class="form-group">
					<label class="text">Birth Date</label><br>
					<input class="form-control" type="date" name="b_date" id="name" value="<?php echo $patient["birth_date"]?>">
				</div>
				<div class="form-group">
					<label class="text">Email</label><br>
					<input class="form-control" type="email" name="email" id="name" readonly="readonly" value="<?php echo $patient["email"]?>">
				</div>
				<div class="form-group">
					<label class="text">Present Address</label><br>
					<input class="form-control" type="text" name="address" id="name"  value="<?php echo $patient["present_address"]?>">
				</div>
				<div class="form-group">
					<label class="text">Permanent Address</label><br>
					<input class="form-control" type="text" name="address2" id="name"  value="<?php echo $patient["permanent_address"]?>">
				</div>
				<div class="form-group">
					<label class="text">City</label><br>
					<input class="form-control" type="text" name="city" id="name"  value="<?php echo $patient["city"]?>">
				</div>
				<?php		
					}
				}
			?>
			<?php
				foreach ($users as $user)
					{
						$l_email = $user["email"];
						//echo $v_email;
						if($l_email == $z_email)
						{
			?>
				<div class="form-group">
					<label class="text">Password</label><br>
					<input class="form-control" type="text" name="pass" value="<?php echo $user["password"]?>" >
				</div>
				<?php		
					}
				}
			?>
			<?php
			
			foreach ($patients as $patient)
					{
						$v_email = $patient["email"];
						//echo $v_email;
						if($v_email == $z_email)
						{
			?>
				<div class="form-group">
					<label class="text">Profile Picture</label><br>
					<input  class="form-control" type="file" name="picture">
				</div>
				<input type="hidden" name="id" value="<?php echo $patient["id"]?>" >
				<input type="hidden" name="prev_image" value="<?php echo $patient["picture"]?>" >
			<?php		
					}
				}
			?>
			<?php
				foreach ($users as $user)
					{
						$l_email = $user["email"];
						//echo $v_email;
						if($l_email == $z_email)
						{
			?>
				<input type="hidden" name="u_id" value="<?php echo $user["u_id"]?>" >
			<?php		
					}
				}
			?>
				<div class="form-group text-center">
					<input class="form-control btn btn-success" type="submit" name="edit_profile" value="Edit Profile">
				</div>
			</form>
			</td>
		</table>
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