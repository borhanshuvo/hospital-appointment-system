<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	include '../controllers/doctor_Controller.php';
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

	include '../controllers/admin_Controller.php';
	$admins=getAllAdmin();
	$a_email = $_SESSION['a_email'];

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
			http.open("GET","searchDoctor.php?sk="+search_word,true);
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
			<th colspan="2">Action</th>
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
				echo '<td class="bg"><a href="editDoctor.php?id='.$doctor["id"].'" class="btn">Edit</a></td>';
				echo '<td class="bg"><a href="deleteDoctor.php?id='.$doctor["id"].'" class="btn">DELETE</a></td>';
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