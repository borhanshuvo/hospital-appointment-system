<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	include '../controllers/patient_Controller.php';
	$patients=getAllPatient();

	if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../index.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-60);
		header("Location:../index.php");
	}

	include_once '../controllers/doctor_Controller.php';
	$doctors=getAllDoctor();
	$d_email = $_SESSION['d_email'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient List</title>
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
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
			http.open("GET","d_searchPatient.php?sk="+search_word,true);
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
	<div class="text-center space">
		<h1>PATIENT LIST</h1>
	</div>
	<div class="topnav search-container">
		<label>SEARCH : </label>
		<input type="text" id="search_input" onkeyup="search()" placeholder="searching...">
		<div id="search_result">
			
		</div>
	</div>
	<hr>
	<table border=1px style="border-collapse:collapse; border-color: white;" class="text-center">
		<tr>
			<th>Id</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Gender</th>
			<th>Blood Type</th>
			<th>Mobile No</th>
			<th>Birth Date</th>
			<th>Email</th>
			<th>Present Address</th>
			<th>Permanent Address</th>
			<th>City</th>
			<th colspan="2">Action</th>
		</tr>
		<?php
			foreach($patients as $patient)
			{
				echo "<tr>";
				echo "<td>"."&nbsp;&nbsp;".$patient["id"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$patient["f_name"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$patient["l_name"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$patient["gender"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$patient["blood_type"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$patient["mobile_no"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$patient["birth_date"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$patient["email"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$patient["present_address"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$patient["permanent_address"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$patient["city"]."&nbsp;&nbsp;"."</td>";
				echo '<td class="bg"><a href="d_editPatient.php?id='.$patient["id"].'" class="btn">Edit</a></td>';
				echo '<td class="bg"><a href="deletePatient.php?id='.$patient["id"].'" class="btn">DELETE</a></td>';
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