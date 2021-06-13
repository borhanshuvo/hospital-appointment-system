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

	include_once '../controllers/admin_Controller.php';
	$admins=getAllAdmin();
	$a_email = $_SESSION['a_email'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Add Department</title>
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
	<?php 
	$err_d_name="";
	$d_name="";
	$err_des="";
	$des="";
	$has_error=false;
	if(isset($_POST['submit']))
		{
			if(empty($_POST['d_name']))
			{
				$err_d_name="Department Name Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['d_name']))
				{
					$err_d_name="You Cannot Input Numeric Value";
					$has_error=true;
					$d_name=htmlspecialchars($_POST['d_name']);
				}
				else
				{
					$d_name=htmlspecialchars($_POST['d_name']);
					$_SESSION['name'] = $d_name;
				}
			}
			if(empty($_POST['des']))
			{
				$err_des="Department Description Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['des']))
				{
					$err_des="You Cannot Input Numeric Value";
					$has_error=true;
					$des=htmlspecialchars($_POST['des']);
				}
				else
				{
					$des=htmlspecialchars($_POST['des']);
					$_SESSION['des'] = $des;
				}
			}
			if(!$has_error)
			{
				header("Location:../controllers/department_Controller.php?req=add_dept");
			}
		}
 ?>
	<div class="register" >
		<h2>ADD DEPARTMENT</h2><hr>
		<form id="register" method="POST" action="">
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
						<textarea type="text" id="name" name="des" placeholder="Description"><?php echo $des;?></textarea><br>
		                <span style="color:red"><?php echo $err_des;?></span>
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