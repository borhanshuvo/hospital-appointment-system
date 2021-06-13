<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	require_once ('../controllers/department_Controller.php');
	$did = $_GET['id'];
	$department = getDepartment($did);

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

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - EDIT Department</title>
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
		<h2>EDIT DEPARTMENT</h2><hr>
		<form id="register" method="POST" action="../controllers/department_Controller.php">
			<table>
				<tr>
					<td>
						<label>Department Name</label><br>
		                <input type="text" name="d_name" id="name" value="<?php echo $department['name']?>">
					</td>
				</tr>
				<tr>
					<td>
						<label>Department Description</label><br>
						<textarea type="text" id="name" name="des" ><?php echo $department['description']?></textarea>
					</td>
				</tr>
				<input type="hidden" name="id" value="<?php echo $department["id"]?>" >
				<tr>
					<td colspan="3">
						<input class="btn" type="submit" name="edit_department" value="Edit Department">
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