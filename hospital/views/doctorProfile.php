<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	include_once ('../controllers/doctor_Controller.php');
	require_once ('../controllers/department_Controller.php');
	include_once '../controllers/login_Controller.php';
	$users=getAllUser();
	$doctors = getAllDoctor();
	$departments=getAllDepartment();

	if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../index.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-60);
		header("Location:../index.php");
	}

	$d_email = $_SESSION['d_email'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor - Profile</title>
	<link rel="stylesheet" type="text/css" href="css/admin_profile.css">
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
	<div class="center" >
		<h2 style="text-align: center; text-transform: uppercase; letter-spacing: 2px;">Profile</h2>
		<hr>
		<table>
			<?php
			
			foreach ($doctors as $doctor)
					{
						$v_email = $doctor["email"];
						//echo $v_email;
						if($v_email == $d_email)
						{
			?>
			<td>
				<img class="item-image" style="margin-right:20px" src="<?php echo $doctor["picture"];?>"></img>
			</td>
			<td>
				<form class="form-horizontal form-material" method="POST" action="../controllers/doctor_Profile_Controller.php" enctype="multipart/form-data">
				<div class="form-group">
					<label class="text">First Name</label><br>
		             <input class="form-control" type="text" name="f_name" id="name"  value="<?php echo $doctor['f_name']?>">
				</div>
				<div class="form-group">
					<label class="text">Last Name</label><br>
		            <input class="form-control" type="text" name="l_name" id="name"  value="<?php echo $doctor['l_name']?>">
				</div>
				<div class="form-group">
					<label class="text">Gender</label><br>
					<select class="fform-control" name="gender">
						<option selected value="<?php echo $doctor['gender']?>"><?php echo $doctor['gender']?></option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
					</select>
				</div>
				<div class="form-group">
					<label class="text">Blood Type</label><br>
					<select class="fform-control" name="blood">
						<option selected value="<?php echo $doctor['blood_type']?>"><?php echo $doctor['blood_type']?></option>
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
					<input class="form-control" type="number" name="mobile_no" id="name"  value="<?php echo $doctor["mobile_no"]?>">
				</div>
				<div class="form-group">
					<label class="text">Birth Date</label><br>
					<input class="form-control" type="date" name="b_date" id="name" value="<?php echo $doctor["birth_date"]?>">
				</div>
				<div class="form-group">
					<label class="text">Email</label><br>
					<input class="form-control" type="email" name="email" id="name" readonly="readonly" value="<?php echo $doctor["email"]?>">
				</div>
				<div class="form-group">
					<label class="text">Department</label><br>
					<select class="fform-control" name="dept">
						<?php
							foreach($departments as $department)
							{
								//echo "<option value='".$department["id"]."'>".$department["name"]."</option>";
								echo "<option value='".$department["name"]."'";
								if($department["id"]==$doctor["id"]) echo "selected";
								echo ">".$department["name"]."</option>";
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Designation</label><br>
		            <textarea type="text"  class="form-control" name="desi"><?php echo $doctor["designation"]?></textarea>
				</div>
				<div class="form-group">
					<label class="text">Qualification</label><br>
		            <textarea type="text"  class="form-control" name="edu"><?php echo $doctor["qualification"]?></textarea>
				</div>
				<div class="form-group">
					<label class="text">Specialist</label><br>
					<input type="text" name="sp_list"  class="form-control"  value="<?php echo $doctor["specialist"]?>">
				</div>
				<div class="form-group">
					<label class="text">Present Address</label><br>
					<input class="form-control" type="text" name="address" id="name"  value="<?php echo $doctor["present_address"]?>">
				</div>
				<div class="form-group">
					<label class="text">Permanent Address</label><br>
					<input class="form-control" type="text" name="address2" id="name"  value="<?php echo $doctor["permanent_address"]?>">
				</div>
				<div class="form-group">
					<label class="text">City</label><br>
					<input class="form-control" type="text" name="city" id="name"  value="<?php echo $doctor["city"]?>">
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
						if($l_email == $d_email)
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
			
			foreach ($doctors as $doctor)
					{
						$v_email = $doctor["email"];
						//echo $v_email;
						if($v_email == $d_email)
						{
			?>
				<div class="form-group">
					<label class="text">Profile Picture</label><br>
					<input  class="form-control" type="file" name="picture">
				</div>
				<input type="hidden" name="id" value="<?php echo $doctor["id"]?>" >
				<input type="hidden" name="prev_image" value="<?php echo $doctor["picture"]?>" >
			<?php		
					}
				}
			?>
			<?php
				foreach ($users as $user)
					{
						$l_email = $user["email"];
						//echo $v_email;
						if($l_email == $d_email)
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