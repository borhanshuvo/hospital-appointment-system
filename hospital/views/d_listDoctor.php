<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	include_once '../controllers/doctor_Controller.php';
	$doctors=getAllDoctor();

	if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../index.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-60);
		header("Location:../index.php");
	}

	$d_email = $_SESSION['d_email'];	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Doctor List</title>
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
			http.open("GET","d_searchDoctor.php?sk="+search_word,true);
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
		<h1>DOCTOR LIST</h1>
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
			<th>Email</th>
			<th>Birth Date</th>
			<th>Department</th>
			<th>Designation</th>
			<th>Qualification</th>
			<th>Specialist</th>
			<th>Present Address</th>
			<th>Permanent Address</th>
			<th>City</th>
		</tr>
		<?php
			foreach($doctors as $doctor)
			{
				echo "<tr>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["id"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["f_name"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["l_name"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["gender"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["blood_type"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["mobile_no"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["email"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["birth_date"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["department"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["designation"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["qualification"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["specialist"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["present_address"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["permanent_address"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$doctor["city"]."&nbsp;&nbsp;"."</td>";
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