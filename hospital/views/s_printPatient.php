<?php 
	
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $id= $_GET['id'];
	$serverName="localhost";
	$userName="root";
	$password="";
	$dbName="hospital";
	$conn = mysqli_connect($serverName, $userName,  $password, $dbName);

	$query="SELECT * FROM add_patient WHERE id='$id'";
    $rs=mysqli_query($conn,$query);

	  if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../index.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-60);
		header("Location:../index.php");
	}
	$s_email = $_SESSION['s_email'];

	include '../controllers/super_admin_Profile_Controller.php';
	$super_admins=getAllSuperAdmin();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Patient List</title>
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
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
			http.open("GET","s_searchPatient.php?sk="+search_word,true);
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
					foreach ($super_admins as $super_admin)
					{
						$v_email = $super_admin["email"];
						//echo $v_email;
						if($v_email == $s_email)
						{
							echo $super_admin['f_name'].' '.$super_admin['l_name'];
						}
					}
				 ?>
			</span>
		</h1>
		
		<ul>
			<li> <a href="super_admin.php">Dashboard</a></li>
			<li class="dropdown">
    				<a href="#">Hospital</a>
	    			<div class="dropdown-content">
	      				<a href="addHospital.php">Add Hospital</a>
	      				<a href="s_listHospital.php">Hospital List</a>
	    			</div>
			</li>
			<li class="dropdown">
    				<a href="#">Admin</a>
	    			<div class="dropdown-content">
	      				<a href="addAdmin.php">Add Admin</a>
	      				<a href="s_listAdmin.php">Admin List</a>
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
			<li>
				<form method="post" action="">
				<input type="submit" value="Log out" name="logout" class="bn">
				</form>
			</li>
		</ul>
	</nav>
	</section>
	<div class="text-center space">
		<h1>PATIENT INFORMATION</h1>
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
		</tr>
		<?php
			while($patient = mysqli_fetch_assoc($rs))
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