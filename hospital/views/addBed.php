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

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Add Bed</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
	<link rel="icon" href="img/hospital.png" sizes="16x16" type="image/png">
</head>
<body>
	<section>	
		<nav class="navber">
		<h1>
			<span class="logo-text">
		
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
			<li> <a href="adminProfile.php">Profile</a></li>
			<li>
				<form method="post" action="">
				<input type="submit" value="Log out" name="logout" class="bn">
				</form>
			</li>
		</ul>
		</nav>
	</section>
	<?php 

	$err_b_type="";
	$b_type="";
	$err_b_des="";
	$b_des="";
	$err_charge="";
	$charge="";
	$has_error=false;

	if(isset($_POST['submit']))
		{
			if(empty($_POST['b_type']))
			{
				$err_b_type="Bed Type Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['b_type']))
				{
					$err_b_type="You Cannot Input Numeric Value";
					$has_error=true;
					$b_type=htmlspecialchars($_POST['b_type']);
				}
				else
				{
					$b_type=htmlspecialchars($_POST['b_type']);
					$_SESSION['b_type'] = $b_type;
				}
			}
			if(empty($_POST['b_des']))
			{
				$err_b_des="Bed Description Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['b_des']))
				{
					$err_b_des="You Cannot Input Numeric Value";
					$has_error=true;
					$b_des=htmlspecialchars($_POST['b_des']);
				}
				else
				{
					$b_des=htmlspecialchars($_POST['b_des']);
					$_SESSION['b_des'] = $b_des;
				}
			}
			if(empty($_POST['charge']))
			{
				$err_charge="Bed Description Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[0-9]*$/", $_POST['charge']))
				{
					$err_charge="You Cannot Input Character";
					$has_error=true;
					$charge=htmlspecialchars($_POST['charge']);
				}
				else
				{
					$charge=htmlspecialchars($_POST['charge']);
					$_SESSION['charge'] = $charge;
				}
			}
			if(!$has_error)
			{
				header("Location:../controllers/department_Controller.php?req=add_dept");
			}
		}
 ?>
	<div class="register" >
		<h2>ADD BED</h2><hr>
		<form id="register" method="POST" action="">
			<table>
				<tr>
					<td>
						<label>Bed Type</label><br>
		                <input type="text" name="b_type" placeholder="Bed Type" id="name" value="<?php echo $b_type;?>"><br><span style="color:Red"><?php echo $err_b_type;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Bed Description</label><br>
						<textarea type="text" id="name" name="b_des" placeholder="Bed Description"><?php echo $b_des;?></textarea><br>
		                <span style="color:red"><?php echo $err_b_des;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Charge</label><br>
						 <input type="text" name="charge" placeholder="Bed Charge" id="name" value="<?php echo $charge;?>"><br><span style="color:Red"><?php echo $err_charge;?></span>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<input class="btn" type="submit" name="submit" value="Submit">
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