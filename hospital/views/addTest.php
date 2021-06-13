<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	include_once '../controllers/department_Controller.php';
	$departments=getAllDepartment();

	include_once '../controllers/doctor_Controller.php';
	$doctors=getAllDoctor();

	include_once '../controllers/admin_Controller.php';
	$admins=getAllAdmin();
	$a_email = $_SESSION['a_email'];

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
	<title>Dashboard - Add Test</title>
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
	$has_error=false;
	$err_t_name="";
	$t_name="";
	$err_t_ammount="";
	$t_ammount="";
	$err_des="";
	$des="";

	if(isset($_POST['submit']))
		{
			if(empty($_POST['t_name']))
			{
				$err_t_name="Test Name Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['t_name']))
				{
					$err_t_name="You Cannot Input Numeric Value";
					$has_error=true;
					$t_name=htmlspecialchars($_POST['t_name']);
				}
				else
				{
					$t_name=htmlspecialchars($_POST['t_name']);
					$_SESSION['t_name'] = $t_name;
				}
			}
			
			if(empty($_POST['t_ammount']))
			{
				$err_t_ammount="Test Ammount Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[0-9]*$/", $_POST['t_ammount']))
				{
					$err_t_ammount="You Can Input Only Numeric Value";
					$has_error=true;
					$t_ammount=htmlspecialchars($_POST['t_ammount']);
				}
				else
				{
					$t_ammount=htmlspecialchars($_POST['t_ammount']);
					$_SESSION['t_ammount'] = $t_ammount;
				
				}
			}
			if(empty($_POST['des']))
			{
				$err_des="Test Description Required";
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
				header("Location:../controllers/test_Controller.php?req=add_test");
			}
		}
 ?>
	<div class="register" >
		<h2>ADD TEST</h2><hr>
		<form id="register" method="POST" action="">
			<table>
				<tr>
					<td>
						<label>Test Name</label><br>
		                <input type="text" name="t_name" placeholder="Enter The Test Name" id="name"  value="<?php echo $t_name;?>"><br><span style="color:red"><?php echo $err_t_name;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Test Ammount</label><br>
						<input type="text" placeholder="Enter The Test Ammount" name="t_ammount" id="name"  value="<?php echo $t_ammount;?>"><br><span style="color:red"><?php echo $err_t_ammount;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Description</label><br>
						<input type="text" name="des" placeholder="Enter The Description" id="name"  value="<?php echo $des;?>"><br><span style="color:red"><?php echo $err_des;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<input class="btn" type="submit" name="submit" value="Submit">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>