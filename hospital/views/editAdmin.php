<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	require_once ('../controllers/admin_Controller.php');
	$aid = $_GET['id'];
	$admin = getAdmin($aid);

	if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../index.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-60);
		header("Location:../index.php");
	}

	include_once '../controllers/admin_Controller.php';
	$admins=getAllAdmin();
	$a_email = $_SESSION['a_email'];
	include_once '../controllers/login_Controller.php';
	$users=getAllUser();
	$s_email = $_SESSION['s_email'];

	include '../controllers/super_admin_Profile_Controller.php';
	$super_admins=getAllSuperAdmin();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - EDIT Admin</title>
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
	<div class="register" >
		<h2>EDIT ADMIN</h2><hr>
		<form id="register" method="POST" action="../controllers/admin_Controller.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>
						<label>First Name</label><br>
		                <input type="text" name="f_name" id="name"  value="<?php echo $admin['f_name']?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Last Name</label><br>
		                <input type="text" name="l_name" id="name"  value="<?php echo $admin['l_name']?>">
					</td>
				</tr>
				<tr>
					<div>
						<td>
							<label>Gender</label><br>
							<select id="name" name="gender">
							<option selected value="<?php echo $admin['gender']?>"><?php echo $admin['gender']?></option>
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
						<option selected value="<?php echo $admin['blood_type']?>"><?php echo $admin['blood_type']?></option>
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
						<input type="number" name="mobile_no" id="name"  value="<?php echo $admin["mobile_no"]?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Birth Date</label><br>
						<input type="date" name="b_date" id="name" value="<?php echo $admin["birth_date"]?>">
					</td>
				</tr>
				<tr>
					<td>
						<label>Email</label><br>
						<input type="email" name="email" id="name"  value="<?php echo $admin["email"]?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Present Address</label><br>
						<input type="text" name="address" id="name"  value="<?php echo $admin["present_address"]?>">
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Permanent Address</label><br>
						<input type="text" name="address2" id="name"  value="<?php echo $admin["permanent_address"]?>">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>City</label><br>
						<input type="text" name="city" id="name"  value="<?php echo $admin["city"]?>">
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<label>Profile Picture</label><br>
						<img class="img" src="<?php echo $admin["picture"];?>"></img>
						<div id="name">
							<input  id="pic" type="file" name="picture">
						</div>
					</td>
					<td></td>
					<td></td>
				</tr>
				<input type="hidden" name="id" value="<?php echo $admin["id"]?>" >
				<input type="hidden" name="prev_image" value="<?php echo $admin["picture"]?>" >
					<?php
				foreach ($users as $user)
					{
						$l_email = $user["email"];
						//echo $v_email;
						if($l_email == $a_email)
						{
			?>
				<input type="hidden" name="u_id" value="<?php echo $user["u_id"]?>" >
				<input class="form-control" type="text" name="pass" value="<?php echo $user["password"]?>" >
			<?php		
					}
				}
			?>
				<tr>
					<td colspan="3">
						<input class="btn" type="submit" name="edit_admin" value="Edit Admin">
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