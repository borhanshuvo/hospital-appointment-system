<?php
include '../controllers/patientappoinment_Controller.php';
$list=getlist();
if(isset($_POST['cancel']))
{
	cancel();
}

?>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/apoint.css">
	</head>
		<body>
		<form action="" method="POST">
		
		<section>	
		<nav id="navber">
		<h1 class="logo">
			<span class="logo-text">ADMIN</span>
		</h1>
		<ul>
			<li> <a href="admin.php">Home</a></li>
			<li> <a href="patientdashboard.php">Dashboard</a></li>
			<li> <a href="apoinment.php">BookAppointment</a></li>
			<li> <a href="patientappoinment.php">Appointment</a></li>
			<li> <a href="admin.php">TestHistory</a></li>
			<li> <a href="admin.php">Prescription</a></li>
			<li> <a href="admin.php">EditProfile</a></li>
			<li> <a href="../index.php">Logout</a></li>
		</ul>
		</nav>
	</section>
	<div class='center'>                                       
	<table class="table table-striped" >
	<tr>
		<th>Doctor Name</th>
		<th>Time</th>
		<th>Cancel</th>
		<th>Status</th>
	</tr>
		<?php
	foreach($list as $list)
	{
		echo "<tr>";
		echo '<td>'.$list["df_name"] .$list["dl_name"].'</td>';
	    echo '<td>'.$list["Time"].'</td>';
		echo '<td><button class="btn" name="cancel" >Cancel</button></td>';
	    echo '<td>'.$list["Status"].'</td>';
		echo "</tr>";
	}
	?>
	</table>
</div>	
		<section>
		<footer>
			<div class="footer">
				<a href="#">© 2020 Hospital Appointment. </a>
			</div>
		</footer>
	</section>
</form>	
		</body>
</html>