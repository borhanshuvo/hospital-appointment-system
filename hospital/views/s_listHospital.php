<?php 
	  include '../controllers/hospital_Controller.php';
	  $hospitals=getAllHospital();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Hospital List</title>
	<link rel="stylesheet" type="text/css" href="css/super_admin_style.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
</head>
<body>
	<section>	
		<nav class="navber">
		<h1>
			<span class="logo-text">SUPER ADMIN
			</span>
		</h1>
		
		<ul>
			<li> <a href="super_admin.php">Home</a></li>
			<li class="dropdown">
    				<a href="#">Hospital</a>
	    			<div class="dropdown-content">
	      				<a href="addHospital.php">Add Hospital</a>
	      				<a href="s_listHospital.php">Hospital List</a>
	    			</div>
			</li>
			<li class="dropdown">
    				<a href="#">Department</a>
	    			<div class="dropdown-content">
	      				<a href="s_listDepartment.php">Department List</a>
	    			</div>
			</li>
			<li class="dropdown">
    				<a href="#">Doctor</a>
	    			<div class="dropdown-content">
	      				<a href="s_listDoctor.php">Doctor List</a>
	    			</div>
			</li>
			<li class="dropdown">
    				<a href="#">Patient</a>
	    			<div class="dropdown-content">
	      				<a href="s_listPatient.php">Patient List</a>
	    			</div>
			</li>
			<li> <a href="super_adminProfile.php">Profile</a></li>
			<li> <a href="../index.php">Log out</a></li>
		</ul>
	</nav>
	</section>
	<section>
		<footer>
			<div class="footer">
				<a href="#">© 2020 Hospital Appointment. </a>
			</div>
		</footer>
	</section>
	<div class="text-center space">
		<h1>HOSPITAL LIST</h1>
	</div><hr>

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
				//.'<a href="../index.php">$hospital["name"]</a>'.
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