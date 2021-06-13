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
	include_once '../controllers/patientappoinment_Controller.php';
	$list=getlist();
	if(isset($_POST['cancel']))
	{
		cancel();
	}
	$z_email = $_SESSION['z_email'];
	include_once '../controllers/patient_Controller.php';
	$patients=getAllPatient();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Appointment List</title>
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
					foreach ($patients as $patient)
					{
						$v_email = $patient["email"];
						//echo $v_email;
						if($v_email == $z_email)
						{
							echo $patient['f_name'].' '.$patient['l_name'];
						}
					}
				 ?>
			</span>
		</h1>
		
		<ul>
			<li> <a href="patient.php">Dashboard</a></li>
			<li>
    				<a href="p_listDoctor.php">Doctor</a>
			</li>
			<li class="dropdown">
    				<a href="#">Appointment</a>
	    			<div class="dropdown-content">
	      				<a href="addAppointment.php">Doctor Appointment</a>
	      				<a href="bookAppointment.php">Booking Appointment</a>
	    			</div>
			</li>
			<li> <a href="patientProfile.php">Profile</a></li>
			<li>
				<form method="post" action="">
				<input type="submit" value="Log out" name="logout" class="bn">
				</form>
			</li>
		</ul>
	</nav>
	</section>
	<div class="text-center space">
		<h1>APPOINTMENT LIST</h1>
	</div>
	<hr>
	<table border=1px style="border-collapse:collapse; border-color: white;" class="text-center">
		<tr>
			<th>Name</th>
			<th>Cancel</th>
			<th>Status</th>
		</tr>
		<?php
			foreach($list as $list)
			{
				echo "<tr>";
				echo "<td>"."&nbsp;&nbsp;".$list["df_name"].' '.$list["dl_name"]."&nbsp;&nbsp;"."</td>";
				?>
				<form method="post" action="">
				<?php
				echo "<td>"."&nbsp;&nbsp;"."<input type='submit' name='cancel' value='CANCEL'>"."&nbsp;&nbsp;"."</td>";
				?>
				</form>
				<?php
				echo "<td>"."&nbsp;&nbsp;".$list["Status"]."&nbsp;&nbsp;"."</td>";
				echo "</tr>";
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
