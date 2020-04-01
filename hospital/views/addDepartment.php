
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Add Department</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
</head>
<body>
	<section>	
		<nav id="navber">
		<h1 class="logo">
			<span class="logo-text">ADMIN
			</span>
		</h1>
		<ul>
			<li> <a href="admin.php">Home</a></li>
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
			<li> <a href="adminProfile.php">Profile</a></li>
			<li> <a href="../index.php">Log out</a></li>
		</ul>
		</nav>
	</section>
	<?php 
	$err_d_name="";
	$d_name="";
	$err_des="";
	$des="";

	if(isset($_POST['submit']))
		{
			if(empty($_POST['d_name']))
			{
				$err_d_name="Fill Up This";
			}
			else
			{			
				$name=htmlspecialchars($_POST['d_name']);
				echo $d_name;
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
		}
		if(isset($_POST['reset']))
		{
			header("Location:addDepartment.php");
		}
 ?>
	<div class="register" >
		<h2>ADD DEPARTMENT</h2><hr>
		<form id="register" method="POST" action="../controllers/department_Controller.php">
			<table>
				<tr>
					<td>
						<label>Department Name</label><br>
		                <input type="text" name="d_name" placeholder="Department Name" id="name" value="<?php echo $d_name;?>"><br><span style="color:Red"><?php echo $err_d_name;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Department Description</label><br>
						<textarea type="text" id="name" name="des" value="<?php echo $des;?>" placeholder="Description"></textarea><br>
		                <span style="color:red"><?php echo $err_des;?></span>
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