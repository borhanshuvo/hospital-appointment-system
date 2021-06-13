<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	require_once ('../controllers/doctor_Controller.php');
	require_once ('../controllers/department_Controller.php');
	include_once '../controllers/login_Controller.php';
	$did = $_GET['id'];
	$doctor = getDoctor($did);
	$departments=getAllDepartment();
	$users=getAllUser();

	if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../index.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-60);
		header("Location:../index.php");
	}

	include '../controllers/admin_Controller.php';
	$admins=getAllAdmin();
	$a_email = $_SESSION['a_email'];
	$d_email = $_SESSION['d_email'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - EDIT Doctor</title>
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
					foreach ($admins as $admin)
					{
						$v_email = $admin["email"];
						//echo $v_email;
						if($v_email == $a_email)
						{
							echo $admin['f_name'].' '.$admin['l_name'];
						}
					}
				 ?>
			</span>
		</h1>
		<ul>
			<li> <a href="admin.php">Dashboard</a></li>
			<li class="dropdown">
    				<a href="#">Department</a>
	    			<div class="dropdown-content">
	      				<a href="addDepartment.php">Add Department</a>
	      				<a href="listDepartment.php">Department List</a>
	    			</div>
			</li>
			<li class="dropdown">
    				<a href="#">Doctor</a>
	    			<div class="dropdown-content">
	      				<a href="addDoctor.php">Add Doctor</a>
	      				<a href="listDoctor.php">Doctor List</a>
	    			</div>
			</li>
			<li class="dropdown">
    				<a href="#">Patient</a>
	    			<div class="dropdown-content">
	    				<a href="addPatient.php">Add Patient</a>
	      				<a href="listPatient.php">Patient List</a>
	    			</div>
			</li>
			<li class="dropdown">
    				<a href="#">Test</a>
	    			<div class="dropdown-content">
	    				<a href="addTest.php">Add Test</a>
	      				<a href="listTest.php">Test List</a>
	    			</div>
			</li>
			<li> <a href="adminProfile.php">Profile</a></li>
			<li>
				<form method="post" action="">
				<input type="submit" value="Log out" name="logout" class="bn">
				</form>
			</li>
		</ul>
		</nav>
	</section>
	<div class="register" >
		<h2>EDIT DOCTOR</h2><hr>
		<form id="register" method="POST" action="../controllers/doctor_Controller.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>
						<label>First Name</label><br>
		                <input type="text" name="f_name" id="name"  value="<?php echo $doctor['f_name']?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Last Name</label><br>
		                <input type="text" name="l_name" id="name"  value="<?php echo $doctor['l_name']?>">
					</td>
				</tr>
				<tr>
					<div>
						<td>
							<label>Gender</label><br>
							<select id="name" name="gender">
							<option selected value="<?php echo $doctor['gender']?>"><?php echo $doctor['gender']?></option>
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
					</td>
				</tr>
				<tr>
					<td>
						<label>Mobile Number</label><br>
						<input type="number" name="mobile_no" id="name"  value="<?php echo $doctor["mobile_no"]?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Birth Date</label><br>
						<input type="date" name="b_date" id="name" value="<?php echo $doctor["birth_date"]?>">
					</td>
				</tr>
				<tr>
					<td>
						<label>Email</label><br>
						<input type="email" name="email" id="name"  value="<?php echo $doctor["email"]?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Department</label><br>
						<select id="name" name="dept">
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
					</td>
				</tr>
				<tr>
					<td>
						<label>Designation</label><br>
		                <textarea type="text" id="name" name="desi"><?php echo $doctor["designation"]?></textarea>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td><label>Qualification</label><br>
		                <textarea type="text" id="name" name="edu"><?php echo $doctor["qualification"]?></textarea>
		            </td>
				</tr>
				<tr>
					<td>
						<label>Specialist</label><br>
						<input type="text" name="sp_list" id="name"  value="<?php echo $doctor["specialist"]?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Present Address</label><br>
						<input type="text" name="address" id="name"  value="<?php echo $doctor["present_address"]?>">
					</td>
				</tr>
				<tr>
					<td>
						<label>Permanent Address</label><br>
						<input type="text" name="address2" id="name"  value="<?php echo $doctor["permanent_address"]?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>City</label><br>
						<input type="text" name="city" id="name"  value="<?php echo $doctor["city"]?>">
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<label>Profile Picture</label><br>
						<img class="img" src="<?php echo $doctor["picture"];?>"></img>
						<div id="name">
							<input  id="pic" type="file" name="picture">
						</div>
					</td>
					<td></td>
					<td></td>
				</tr>
				<input type="hidden" name="id" value="<?php echo $doctor["id"]?>" >
				<input type="hidden" name="prev_image" value="<?php echo $doctor["picture"]?>" >
					<?php
				foreach ($users as $user)
					{
						$l_email = $user["email"];
						//echo $v_email;
						if($l_email == $d_email)
						{
			?>
				<input type="hidden" name="u_id" value="<?php echo $user["u_id"]?>" >
				<input type="hidden" name="pass" value="<?php echo $user["password"]?>" >
			<?php		
					}
				}
			?>
				<tr>
					<td colspan="3">
						<input class="btn" type="submit" name="edit_doctor" value="Edit Doctor">
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