<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	require_once ('../controllers/hospital_Controller.php');
	$hid = $_GET['id'];
	$hospital = getHospital($hid);

	if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../index.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-60);
		header("Location:../index.php");
	}
	$s_email = $_SESSION['s_email'];

	include '../controllers/super_admin_Profile_Controller.php';
	$super_admins=getAllSuperAdmin();
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Dashboard - EDIT Hospital</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="stylesheet" type="text/css" href="css/super_admin_style.css">
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
		<form id="register" method="POST" action="../controllers/hospital_Controller.php">
			<table>
				<tr>
					<td>
						<label>Hospital Name</label><br>
		                <input type="text" name="h_name" id="name" value="<?php echo $hospital["name"]?>">
					</td>
				</tr>
				<tr>
					<td>
						<label>Hospital Description</label><br>
						<textarea type="text" id="name" name="des"><?php echo $hospital["description"]?></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<label>Hospital Email Address</label><br>
						<input type="email" name="email" id="name" value="<?php echo $hospital["email"]?>">
					</td>
				</tr>
				<tr>
					<td>
						<label>Hospital Mobile No</label><br>
						<input type="number" name="phone_no" id="name"  value="<?php echo $hospital["phone_no"]?>">
					</td>
				</tr>
				<tr>
					<td>
						<label>Hospital Address</label><br>
		                <textarea type="text" name="address" id="name"><?php echo $hospital["address"]?></textarea>
					</td>
				</tr>
				<input type="hidden" name="id" value="<?php echo $hospital["id"]?>" >
				<tr>
					<td colspan="3">
						<input class="btn" type="submit" name="edit_hospital" value="Edit Hospital">
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