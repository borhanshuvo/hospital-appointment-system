<?php 
	  include '../controllers/department_Controller.php';
	  $departments=getAllDepartment();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Add Doctor</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
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
			<li> <a href="adminProfile.php">Profile</a></li>
			<li> <a href="../index.php">Log out</a></li>
		</ul>
		</nav>
	</section>
	<?php 
	$has_error=false;
	$err_f_name="";
	$f_name="";
	$err_l_name="";
	$l_name="";
	$err_address="";
	$address="";
	$err_address2="";
	$address2="";
	$err_street="";
	$street="";
	$err_zip_code="";
	$zip_code="";
	$err_city="";
	$city="";
	$err_mobile_no="";
	$mobile_no="";
	$err_email="";
	$email="";
	$err_pass="";
	$pass="";
	$err_c_pass="";
	$c_pass="";
	$err_blood="";
	$blood="";
	$err_gender="";
	$gender="";
	$err_b_date="";
	$b_date="";
	$err_picture="";
	$picture="";
	$desi="";
	$err_desi="";
	$dept="";
	$err_dept="";
	$sp_list="";
	$err_sp_list="";
	$edu="";
	$err_edu="";
	$err_status="";
	$status="";

	if(isset($_POST['submit']))
		{
			if(empty($_POST['f_name']))
			{
				$err_f_name="First Name Required";
				$has_error=true;
			}
			else
			{			
				$name=htmlspecialchars($_POST['f_name']);
				
			}
			if(empty($_POST['l_name']))
			{
				$err_l_name="Last Name Required";
				$has_error=true;
			}
			else
			{			
				$name=htmlspecialchars($_POST['l_name']);
				
			}
			if(empty($_POST['address']))
			{
				$err_address="Present Address Required";
			}
			else
			{			
				$name=htmlspecialchars($_POST['address']);
				echo $address;
			}
			if(empty($_POST['address2']))
			{
				$err_address2="Permanent Address Required";
			}
			else
			{			
				$name=htmlspecialchars($_POST['address2']);
				echo $address2;
			}
			if(empty($_POST['city']))
			{
				$err_city="City Required";
			}
			else
			{			
				$name=htmlspecialchars($_POST['city']);
				echo $city;
			}
			if(empty($_POST['mobile_no']))
			{
				$err_mobile_no="Mobile No Required";
			}
			else
			{			
				$name=htmlspecialchars($_POST['mobile_no']);
				echo $mobile_no;
			}
			if(empty($_POST['email']))
			{
				$err_email="Email Required";
			}
			else
			{			
				$name=htmlspecialchars($_POST['email']);
				echo $email;
			}
			if(empty($_POST['pass']))
			{
				$err_pass="Password Required";
			}
			else
			{			
				$name=htmlspecialchars($_POST['pass']);
				echo $pass;
			}
			if(empty($_POST['desi']))
			{
				$err_desi="Designation Required";
			}
			else
			{			
				$name=htmlspecialchars($_POST['desi']);
				echo $desi;
			}
			if(empty($_POST['edu']))
			{
				$err_edu="Qualification Required";
			}
			else
			{			
				$name=htmlspecialchars($_POST['edu']);
				echo $edu;
			}
			if(empty($_POST['sp_list']))
			{
				$err_sp_list="Designation Required";
			}
			else
			{			
				$name=htmlspecialchars($_POST['sp_list']);
				echo $sp_list;
			}
			if(empty($_POST['blood']))
			{
				$err_blood ="Please Select Blood";
			}
			else
			{			
				echo $blood;
			}
			if(empty($_POST['dept']))
			{
				$err_dept ="Please Select Department";
			}
			else
			{			
				echo $dept;
			}
			if(empty($_POST['gender']))
			{
				$err_gender ="Please Select Gender";
			}
			else
			{			
				echo $gender;
			}
			if(empty($_POST['b_date']))
			{
				$err_b_date ="Please Select Birth Date";
			}
			if(empty($_POST['picture']))
			{
				$err_picture ="Please Choose Picture";
			}
			if(empty($_POST['status']))
			{
				$err_status="Select Any One";
			}
			else
			{			
				echo $status;
			}
		}
		if(isset($_POST['reset']))
		{
			session_start();
			header("Location:addDoctor.php");
		}
 ?>
	<div class="register" >
		<h2>ADD DOCTOR</h2><hr>
		<form id="register" method="POST" action="../controllers/doctor_Controller.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>
						<label>First Name</label><br>
		                <input type="text" name="f_name" placeholder="Enter The First Name" id="name"  value="<?php echo $f_name;?>"><br><span style="color:red"><?php echo $err_f_name;?></span>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Last Name</label><br>
		                <input type="text" name="l_name" placeholder="Enter The Last Name" id="name"  value="<?php echo $l_name;?>"><br><span style="color:red"><?php echo $err_l_name;?></span>
					</td>
				</tr>
				<tr>
					<div>
						<td>
							<label>Gender</label><br>
							<select id="name" name="gender">
							<option selected value="NULL">Select Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
							</select><br>
							<span style="color:red"><?php echo $err_gender;?></span>
						</td>
					</div>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Blood Type</label><br>
						<select id="name" name="blood">
						<option selected value="NULL">Select Blood</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
						</select><br>
						<span style="color:red"><?php echo $err_blood;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Mobile Number</label><br>
						<input type="number" placeholder="Enter The Mobile Number" name="mobile_no" id="name"  value="<?php echo $mobile_no;?>"><br><span style="color:red"><?php echo $err_mobile_no;?></span>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Birth Date</label><br>
						<input type="date" name="b_date" id="name" value="<?php echo $b_date;?>"><br><span style="color:red"><?php echo $err_b_date;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Email</label><br>
						<input type="email" name="email" placeholder="Enter The Email" id="name"  value="<?php echo $email;?>"><br><span style="color:red"><?php echo $err_email;?></span>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Department</label><br>
						<select id="name" name="dept">
						<option selected value="NULL">Select Department</option>
						<?php
							foreach($departments as $department)
							{
								echo "<option value='".$department["name"]."'>".$department["name"]."</option>";
							}
						?>
						</select><br>
						<span style="color:red"><?php echo $err_dept;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Designation</label><br>
		                <textarea type="text" id="name" name="desi" value="<?php echo $desi;?>" placeholder="Designation"></textarea><br>
		                <span style="color:red"><?php echo $err_desi;?></span>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td><label>Qualification</label><br>
		                <textarea type="text" id="name" name="edu" value="<?php echo $edu;?>" placeholder="About Your Qualification"></textarea><br>
		                <span style="color:red"><?php echo $err_edu;?></span>
		            </td>
				</tr>
				<tr>
					<td>
						<label>Specialist</label><br>
						<input type="text" name="sp_list" placeholder="Specialist" id="name"  value="<?php echo $sp_list;?>"><br><span style="color:red"><?php echo $err_sp_list;?></span>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Password</label><br>
						<input type="password" name="pass" placeholder="Enter The Password" id="name"  value="<?php echo $pass;?>"><br><span style="color:red"><?php echo $err_pass;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Present Address</label><br>
						<input type="text" name="address" placeholder="Enter The Present Address" id="name"  value="<?php echo $address;?>"><br><span style="color:red"><?php echo $err_address;?></span>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Permanent Address</label><br>
						<input type="text" name="address2" placeholder="Enter The Permanent Address" id="name"  value="<?php echo $address2;?>"><br><span style="color:red"><?php echo $err_address2;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>City</label><br>
						<input type="text" name="city" placeholder="Enter The City" id="name"  value="<?php echo $city;?>"><br><span style="color:red"><?php echo $err_city;?></span>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Profile Picture</label><br>
						<div id="name">
							<input  id="pic" type="file" name="picture" value="<?php echo $picture;?>" ><br><span style="color:red"><?php echo $err_picture;?></span>
						</div>
					</td>
					
				</tr>
				<tr>
					<td colspan="3">
						<input class="btn" type="submit" name="submit" value="Submit">
						<input class="btn" type="submit" name="reset" value="Reset">
					</td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>