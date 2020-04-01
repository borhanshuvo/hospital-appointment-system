
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Patient List</title>
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
</head>
<body>
	<section>	
		<nav id="navber">
		<h1 class="logo">
			<span class="logo-text">ADMIN
			</span>
		</h1>
		<ul>
			<li> <a href="admin.php">Home</a></li>
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
			<li> <a href="">Profile</a></li>
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
</body>
</html>