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

	include_once '../controllers/patient_Controller.php';
	include_once '../controllers/patientappoinment_Controller.php';
	$apoints= getAllAppoints();
	$list=getlist();

	$d_email = $_SESSION['d_email'];

	include_once '../controllers/doctor_Controller.php';
	$doctors=getAllDoctor();

	if(isset($_POST['accept']))
	{	
							 
		$id=$GLOBALS['p_id'];
		updateat($id);
							  
	}
						  
	if(isset($_POST['Reject']))
	{
		$id=$GLOBALS['p_id'];
		updatert($id);
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
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
	<table border=1px style="border-collapse:collapse; border-color: white;" class="text-center">
		<tr>
			<th>Name</th>
			<th>Accept</th>
			<th>Reject</th>
		</tr>
		<?php
			foreach($list as $list)
			{
				$Status= $list["Status"];
				if($Status=="Pending")
				{
					foreach($apoints as $apoint)
					{
						echo "<tr>";
						echo "<td>"."&nbsp;&nbsp;".$apoint["pf_name"].' '.$apoint["pl_name"]."&nbsp;&nbsp;"."</td>";
						?>
						<form method="post" action="">
						<?php
						echo "<td>"."&nbsp;&nbsp;"."<input type='submit' name='accept' value='ACCEPT'>"."&nbsp;&nbsp;"."</td>";
						echo "<td>"."&nbsp;&nbsp;"."<input type='submit' name='Reject' value='REJECT'>"."&nbsp;&nbsp;"."</td>";
						?>
						</form>
						<?php
						echo "</tr>";
						$id=$apoint["p_id"];
						
					}
				}
			}
		?>
	</table>
	<section>
		<footer>
			<div class="footer">
				<a href="#">© 2020 Hospital Appointment. </a>
			</div>
		</footer>
	</section>
</body>
</html>	