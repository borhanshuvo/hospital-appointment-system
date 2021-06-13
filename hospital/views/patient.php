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

	$r_email = $_COOKIE['loggedinuser'];
	$_SESSION['z_email'] = $r_email;
	$z_email = $_SESSION['z_email'];

	include_once '../controllers/hospital_Controller.php';
	$hospitals=getAllHospital();
	include '../controllers/patient_Controller.php';
	$patients=getAllPatient();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Patient</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/admin_signup.css"> -->
	
	<link rel="stylesheet" type="text/css" href="css/super_admin_style.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="icon" href="img/hospital.png" sizes="16x16" type="image/png">

	<script>
		function search()
		{
			http = new XMLHttpRequest();
			var search_word=document.getElementById("search_input").value;
			http.onreadystatechange=function()
			{
				if(http.readyState == 4 && http.status == 200)
				{
					document.getElementById("search_result").innerHTML=http.responseText;
				}
			}
			http.open("GET","p_searchHospital.php?sk="+search_word,true);
		    http.send();
		}
		
	</script>
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
		<h1>HOSPITAL LIST</h1>
	</div>
	<div class="topnav search-container">
		<label>SEARCH : </label>
		<input type="text" id="search_input" onkeyup="search()" placeholder="search here">
		<div id="search_result">
			
		</div>
	</div>
	<hr>

	<table border=1px style="border-collapse:collapse; border-color: white;" class="text-center">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Description</th>
			<th>Email</th>
			<th>Phone No</th>
			<th>Address</th>
		</tr>
		<?php
			foreach($hospitals as $hospital)
			{
				echo "<tr>";
				echo "<td>"."&nbsp;&nbsp;".$hospital["id"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".'<a href="login.php">'.$hospital["name"].'</a>'."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$hospital["description"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$hospital["email"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$hospital["phone_no"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$hospital["address"]."&nbsp;&nbsp;"."</td>";
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