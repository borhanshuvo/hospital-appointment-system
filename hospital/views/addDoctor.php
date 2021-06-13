<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	include_once '../controllers/department_Controller.php';
	$departments=getAllDepartment();

	include_once '../controllers/doctor_Controller.php';
	$doctors=getAllDoctor();

	include_once '../controllers/admin_Controller.php';
	$admins=getAllAdmin();
	$a_email = $_SESSION['a_email'];

	if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../index.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-60);
		header("Location:../index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Add Doctor</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
	<link rel="icon" href="img/hospital.png" sizes="16x16" type="image/png">
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
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['f_name']))
				{
					$err_f_name="You Cannot Input Numeric Value";
					$has_error=true;
					$f_name=htmlspecialchars($_POST['f_name']);
				}
				else
				{
					$f_name=htmlspecialchars($_POST['f_name']);
					$_SESSION['f_name'] = $f_name;
				}
			}
			if(empty($_POST['l_name']))
			{
				$err_l_name="Last Name Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['l_name']))
				{
					$err_l_name="You Cannot Input Numeric Value";
					$has_error=true;
					$l_name=htmlspecialchars($_POST['l_name']);
				}
				else
				{
					$l_name=htmlspecialchars($_POST['l_name']);
					$_SESSION['l_name'] = $l_name;
				}
			}
			if(empty($_POST['address']))
			{
				$err_address="Present Address Required";
				$has_error=true;
			}
			else
			{
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['address']))
				{
					$err_address="You Cannot Input Numeric Value";
					$has_error=true;
					$address=htmlspecialchars($_POST['address']);
				}
				else
				{
					$address=htmlspecialchars($_POST['address']);
					$_SESSION['address'] = $address;
				}				
			}
			if(empty($_POST['address2']))
			{
				$err_address2="Permanent Address Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['address2']))
				{
					$err_address2="You Cannot Input Numeric Value";
					$has_error=true;
					$address2=htmlspecialchars($_POST['address2']);
				}
				else
				{
					$address2=htmlspecialchars($_POST['address2']);
					$_SESSION['address2'] = $address2;
				}
			}
			if(empty($_POST['city']))
			{
				$err_city="City Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['city']))
				{
					$err_city="You Cannot Input Numeric Value";
					$has_error=true;
					$city=htmlspecialchars($_POST['city']);
				}
				else
				{
					$city=htmlspecialchars($_POST['city']);
					$_SESSION['city'] = $city;
				}
			}
			if(empty($_POST['mobile_no']))
			{
				$err_mobile_no="Mobile No Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[0-9]*$/", $_POST['mobile_no']))
				{
					$err_mobile_no="You Can Input Only Numeric Value";
					$has_error=true;
					$mobile_no=htmlspecialchars($_POST['mobile_no']);
				}
				else
				{
					if(strlen($_POST['mobile_no']) < 11)
					{
						$err_mobile_no="Mobile Number Too Short";
						$has_error=true;
						$mobile_no=htmlspecialchars($_POST['mobile_no']);
					}
					else
					{
						$mobile_no=htmlspecialchars($_POST['mobile_no']);
						$_SESSION['mobile_no'] = $mobile_no;
					}
				}
			}
			if(empty($_POST['email']))
			{
				$err_email="Email Required";
				$has_error=true;
			}
			else
			{			
				foreach($doctors as $doctor)
				{
					$v_email = $doctor["email"];
					if($v_email == $_POST['email'])
					{
						$err_email="Already Use This Email";
						$has_error=true;
						$email=htmlspecialchars($_POST['email']);
					}
					else
					{
						$email=htmlspecialchars($_POST['email']);
						$_SESSION['email'] = $email;
					}
				}
			}
			if(empty($_POST['pass']))
			{
				$err_pass="Password Required";
				$has_error=true;
			}
			else
			{			
				if(strlen($_POST['pass']) < 8)
				{
					$err_pass="Password At Least 8 Character";
					$has_error=true;
					$pass=htmlspecialchars($_POST['pass']);
				}
				else
				{
					$pass=htmlspecialchars($_POST['pass']);
					$_SESSION['pass'] = $pass;
				}
			}
			if(empty($_POST['desi']))
			{
				$err_desi="Designation Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['desi']))
				{
					$err_desi="You Cannot Input Numeric Value";
					$has_error=true;
					$desi=htmlspecialchars($_POST['desi']);
				}
				else
				{
					$desi=htmlspecialchars($_POST['desi']);
					$_SESSION['desi'] = $desi;
				}
			}
			if(empty($_POST['edu']))
			{
				$err_edu="Qualification Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['edu']))
				{
					$err_edu="You Cannot Input Numeric Value";
					$has_error=true;
					$edu=htmlspecialchars($_POST['edu']);
				}
				else
				{
					$edu=htmlspecialchars($_POST['edu']);
					$_SESSION['edu'] = $edu;
				}
			}
			if(empty($_POST['sp_list']))
			{
				$err_sp_list="Designation Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['sp_list']))
				{
					$err_sp_list="You Cannot Input Numeric Value";
					$has_error=true;
					$sp_list=htmlspecialchars($_POST['sp_list']);
				}
				else
				{
					$sp_list=htmlspecialchars($_POST['sp_list']);
					$_SESSION['sp_list'] = $sp_list;
				}
			}
			if(empty($_POST['blood']))
			{
				$err_blood ="Please Select Blood";
				$has_error=true;
			}
			else
			{			
				$blood=htmlspecialchars($_POST['blood']);
				$_SESSION['blood'] = $blood;
			}
			if(empty($_POST['dept']))
			{
				$err_dept ="Please Select Department";
				$has_error=true;
			}
			else
			{			
				$dept=htmlspecialchars($_POST['dept']);
				$_SESSION['dept'] = $dept;
			}
			if(empty($_POST['gender']))
			{
				$err_gender ="Please Select Gender";
				$has_error=true;
			}
			else
			{			
				$gender=htmlspecialchars($_POST['gender']);
				$_SESSION['gender'] = $gender;
			}
			if(empty($_POST['b_date']))
			{
				$err_b_date ="Please Select Birth Date";
				$has_error=true;
			}
			else
			{
				$b_date=htmlspecialchars($_POST['b_date']);
				$_SESSION['b_date'] = $b_date;
			}
			if(empty($_POST['picture']))
			{
				$err_picture ="Please Choose Picture";
			}
			
			if(!$has_error)
			{
				$target_dir="../storage/doctor_image/";
				$target_file = $target_dir . basename($_FILES["picture"]["name"]);
				$uploadOk = 1;
		        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
		        $_SESSION['img']=$target_file;
		        
				header("Location:../controllers/doctor_Controller.php?req=add_doct");
			}
		}
 ?>
	<div class="register" >
		<h2>ADD DOCTOR</h2><hr>
		<form id="register" method="POST" action="" enctype="multipart/form-data">
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
                            <select class="names" name="gender">
                            <option selected disabled value="NULL">Select Gender</option>
                            <option <?php if($gender == 'Male') echo 'selected'; ?> value="Male">Male</option>
                            <option <?php if($gender == 'Female') echo 'selected'; ?> value="Female">Female</option>
                            <option <?php if($gender == 'Other') echo 'selected'; ?> value="Other">Other</option>
                            </select><br>
                            <span style="color:red"><?php echo $err_gender;?></span>
                        </td>
					</div>
					<td>&nbsp;&nbsp;</td>
					<td>
						<label>Blood Type</label><br>
						<select class="names" name="blood">
						<option selected disabled value="NULL">Select Blood</option>
						<option <?php if($blood == 'A+') echo 'selected'; ?> value="A+">A+</option>
						<option <?php if($blood == 'A-') echo 'selected'; ?> value="A-">A-</option>
						<option <?php if($blood == 'B+') echo 'selected'; ?> value="B">B+</option>
						<option <?php if($blood == 'B-') echo 'selected'; ?> value="B-">B-</option>
						<option <?php if($blood == 'AB+') echo 'selected'; ?> value="AB+">AB+</option>
						<option <?php if($blood == 'AB-') echo 'selected'; ?> value="AB-">AB-</option>
						<option <?php if($blood == 'O+') echo 'selected'; ?> value="O+">O+</option>
						<option <?php if($blood == 'O-') echo 'selected'; ?> value="O-">O-</option>
						</select><br>
						<span style="color:red"><?php echo $err_blood;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Mobile Number</label><br>
						<input type="text" placeholder="Enter The Mobile Number" name="mobile_no" id="name"  value="<?php echo $mobile_no;?>"><br><span style="color:red"><?php echo $err_mobile_no;?></span>
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
						<select class="names" name="dept">
						<option selected disabled>Select Department</option>
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
		                <textarea type="text" id="name" name="desi"placeholder="Designation"><?php echo $desi;?></textarea><br>
		                <span style="color:red"><?php echo $err_desi;?></span>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td><label>Qualification</label><br>
		                <textarea type="text" id="name" name="edu"placeholder="About Your Qualification"><?php echo $edu;?></textarea><br>
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
						<input type="text" name="pass" placeholder="Enter The Password" id="name"  value="<?php echo $pass;?>"><br><span style="color:red"><?php echo $err_pass;?></span>
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
							<input  id="pic" type="file" name="picture" value="<?php echo $picture;?>">
						</div>
						<span style="color:red"><?php echo $err_picture;?></span>
					</td>
					
				</tr>
				<tr>
					<td colspan="3">
						<input class="btn" type="submit" name="submit" value="Submit">
					</td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>