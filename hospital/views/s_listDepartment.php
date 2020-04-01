<?php 
	  include '../controllers/department_Controller.php';
	  $departments=getAllDepartment();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Department List</title>
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
</head>
<body>
	<section>	
		<nav id="navber">
		<h1 class="logo">
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
	<div class="text-center space">
		<h1>DEPARTMENT LIST</h1>
	</div><hr>
	<table border=1px style="border-collapse:collapse; border-color: white;" class="text-center">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Description</th>
		</tr>
		<?php
			foreach($departments as $department)
			{
				echo "<tr>";
				echo "<td>"."&nbsp;&nbsp;".$department["id"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$department["name"]."&nbsp;&nbsp;"."</td>";
				echo "<td>"."&nbsp;&nbsp;".$department["description"]."&nbsp;&nbsp;"."</td>";
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