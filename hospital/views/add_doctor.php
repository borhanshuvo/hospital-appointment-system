<?php 
	include_once('session_user.php');

	$has_error=false;

	$err_f_name="";
	$f_name="";

	$err_l_name="";
	$l_name="";

	$err_gender="";
	$gender="";

	$err_blood="";
	$blood="";

	$err_mobile_no="";
	$mobile_no="";

	$err_b_date="";
	$b_date="";

	$err_email="";
	$email="";

	$password="";
	$err_password="";

	$c_password="";
	$err_c_password="";

	$err_address="";
	$address="";

	$img="";
	$err_img="";

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

			if(empty($_POST['status']))
			{
				$err_status ="Status Required";
				$has_error=true;
			}
			else
			{			
				$status=htmlspecialchars($_POST['status']);
				$_SESSION['status'] = $status;
			}

			if(empty($_POST['address']))
			{
				$err_address="Address Required";
				$has_error=true;
			}
			else
			{
				$address=htmlspecialchars($_POST['address']);
				$_SESSION['address'] = $address;
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
						$err_mobile_no="Mobile number not less than 11 characters";
						$has_error=true;
						$mobile_no=htmlspecialchars($_POST['mobile_no']);
					}
					elseif(strlen($_POST['mobile_no']) > 11)
					{
						$err_mobile_no="Mobile number not more than 11 characters";
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
				$err_email="*Email Required";
				$has_error=true;
			}
			else
			{
				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
				{
				    $err_email="*Email Invalid";
				    $email=htmlspecialchars($_POST['email']);
					$has_error=true;
				}
				else
				{
					$email=htmlspecialchars($_POST['email']);
					$_SESSION['email'] = $email;
				}
			}

			if(empty($_POST['password']))
			{
				$err_password="*Password Required";
				$has_error=true;
			}
			else 
			{
				if ( !preg_match('@[^\w]@', $_POST['password'] ) )
				{
					$err_password="*Password must contain at least one of the special characters";
					$has_error=true;
					$password=htmlspecialchars($_POST['password']);
				}
				else
				{
					if(strlen($_POST['password']) < 8)
					{
						$err_password="*Password not be less than 8 characters";
						$has_error=true;
						$password=htmlspecialchars($_POST['password']);
					}
					else
					{
						$password=htmlspecialchars($_POST['password']);
					}
				}
			}

			if(empty($_POST['c_password']))
			{
				$err_c_password="*Confirm Password Required";
				$has_error=true;
			}
			else 
			{
				if ( $_POST['password'] != $_POST['c_password'])
				{
					$err_c_password="*Password & Confirm Password Not Match!!";
					$has_error=true;
				}
				else
				{
					$c_password=htmlspecialchars($_POST['c_password']);
					$_SESSION['password'] = sha1($c_password);
				}
			}

			if(empty($_POST['b_date']))
			{
				$err_b_date="*Date Required";
				$has_error=true;
			}
			else
			{
				if(time() < strtotime('+18 years', strtotime($_POST['b_date'])))
				{
					$err_b_date="*You are under 18 years of age";
					$b_date=htmlspecialchars($_POST['b_date']);
					$has_error=true;
				}
				else
				{
					$b_date=htmlspecialchars($_POST['b_date']);
					$_SESSION['b_date'] = $b_date;
				}
			}

			if(empty(basename($_FILES["img"]["name"])))
			{
				$err_img="*Image Required";
				$has_error=true;
			}
			else
			{
				$target_dir    = "../storage/doctor_image/";
				$target_file   = $target_dir . basename($_FILES["img"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
				{
				    $err_img="*Sorry, Only JPG, JPEG & PNG files are allowed";
					$has_error=true;
				    $uploadOk = 0;
				}
			}

			if(!$has_error  && $uploadOk == 1)
			{

		        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
				$_SESSION['img'] = $target_file;

				header("Location:../controllers/doctor_Controller.php?req=add_doc");

			}
		}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Add Doctor</title>
	<?php include_once('css/bootstrap.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
</head>
<body>
	<?php include_once('header.php'); ?>
    <?php include_once('sidebar.php'); ?>

		<section class="col-md-10 pt-5 pb-5">
			<div class="pb-5">
				<div class="container d-flex justify-content-center card">
					<div class="card-header">
						<h4 class="text-center">A D D &nbsp; &nbsp; D O C T O R</h4>
					</div>
					<div class="card-body">
						<form method="POST" class="row" action="" enctype="multipart/form-data">

							<div class="col-md-6 pb-1">
							    <label for="f_name" class="form-label">First Name</label>
							    <input type="text" name="f_name" class="form-control" id="f_name" value="<?php echo $f_name;?>" autocomplete="off" onkeyup="checkFirstName()" onblur="checkFirstName()">
							    <span style="color:red" id="err_f_name"><?php echo $err_f_name;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="l_name" class="form-label">Last Name</label>
							    <input type="text" name="l_name" class="form-control" id="l_name" value="<?php echo $l_name;?>" autocomplete="off" onkeyup="checkLastName()" onblur="checkLastName()">
							    <span style="color:red" id="err_l_name"><?php echo $err_l_name;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="gender" class="form-label">Gender</label>
							    <select id="gender" name="gender" class="form-select" onkeyup="checkGender()" onblur="checkGender()">
								    <option selected disabled value="NULL">Select Gender</option>
				                    <option <?php if($gender == 'Male') echo 'selected'; ?> value="Male">Male</option>
				                    <option <?php if($gender == 'Female') echo 'selected'; ?> value="Female">Female</option>
				                    <option <?php if($gender == 'Other') echo 'selected'; ?> value="Other">Other</option>
							    </select>
								<span style="color:red" id="err_gender"><?php echo $err_gender;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="blood" class="form-label">Blood Type</label>
							    <select id="blood" name="blood" class="form-select" onkeyup="checkBlood()" onblur="checkBlood()">
								    <option selected disabled value="NULL">Select Blood</option>
									<option <?php if($blood == 'A+') echo 'selected'; ?> value="A+">A+</option>
									<option <?php if($blood == 'A-') echo 'selected'; ?> value="A-">A-</option>
									<option <?php if($blood == 'B+') echo 'selected'; ?> value="B">B+</option>
									<option <?php if($blood == 'B-') echo 'selected'; ?> value="B-">B-</option>
									<option <?php if($blood == 'AB+') echo 'selected'; ?> value="AB+">AB+</option>
									<option <?php if($blood == 'AB-') echo 'selected'; ?> value="AB-">AB-</option>
									<option <?php if($blood == 'O+') echo 'selected'; ?> value="O+">O+</option>
									<option <?php if($blood == 'O-') echo 'selected'; ?> value="O-">O-</option>
							    </select>
								<span style="color:red" id="err_blood"><?php echo $err_blood;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="mobile_no" class="form-label">Mobile Number</label>
							    <input type="text" name="mobile_no" class="form-control" id="phone_no" value="<?php echo $mobile_no;?>" autocomplete="off" onkeyup="checkNumber()" onblur="checkNumber()">
							    <span style="color:red" id="err_phone_no"><?php echo $err_mobile_no;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="b_date" class="form-label">Birth Date</label>
							    <input type="date" name="b_date" class="form-control" id="b_date" value="<?php echo $b_date;?>" onkeyup="checkBirthDate()" onblur="checkBirthDate()">
							    <span style="color:red" id="err_b_date"><?php echo $err_b_date; ?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="password" class="form-label">Password</label>
							    <input type="password" name="password" class="form-control" id="password" value="<?php echo $password;?>" onkeyup="checkPassword()" onblur="checkPassword()">
							    <input type="checkbox" onclick="passwordShow()"> Show Password <br>
							    <span style="color:red" id="err_password"><?php echo $err_password;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="c_password" class="form-label">Confirm Password</label>
							    <input type="password" name="c_password" class="form-control" id="c_password" value="<?php echo $c_password;?>" onkeyup="checkConfirmPassword()" onblur="checkConfirmPassword()">
							    <input type="checkbox" onclick="confirmPasswordShow()"> Show Password<br>
							    <span style="color:red" id="err_c_password"><?php echo $err_c_password;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="email" class="form-label">Email</label>
							    <input type="text" name="email" class="form-control" id="email" value="<?php echo $email;?>" autocomplete="off" onkeyup="checkEmail()" onblur="checkEmail()">
							    <span style="color:red" id="err_email"><?php echo $err_email;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="status" class="form-label">Status</label>
							    <select id="status" name="status" class="form-select" onkeyup="checkStatus()" onblur="checkStatus()">
								<option selected disabled value="NULL">Select Status</option>
				                    <option <?php if($status == 1 ) echo 'selected'; ?> value="1">Active</option>
				                    <option <?php if($status == 2 ) echo 'selected'; ?> value="2">In-Active</option>
							    </select>
								<span style="color:red" id="err_status"><?php echo $err_status;?></span>
							 </div>

							<div class="col-md-6 pb-1">
							    <label for="address" class="form-label">Address</label>
							    <textarea name="address" class="form-control h-25" id="address" autocomplete="off" onkeyup="checkAddress()" onblur="checkAddress()"><?php echo $address;?></textarea>
							    <span style="color:red" id="err_address"><?php echo $err_address;?></span>
							</div>

							<div class="col-6 pb-1">
							  	<label for="img" class="form-label">Profile Picture</label>
							    <input type="file" name="img" class="form-control" id="img" onkeyup="checkProfilePicture()" onblur="checkProfilePicture()">
							    
							    <span style="color:red" id="err_img"><?php echo $err_img;?></span>
							</div>

							<div class="col-12 pt-2 pb-1">
							    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
							</div>

						</form>
					</div>
				</div>
			</div>
		</section>

	</main>
	<?php include_once('js/javascript.php'); ?>
</body>
</html>