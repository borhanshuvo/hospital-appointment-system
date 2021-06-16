<?php
	include_once('session_user.php');

	require_once ('../controllers/user_Controller.php');
	$a_id = $_GET['id'];
	$doctor = getUser($a_id);

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

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Doctor</title>
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
						<h4 class="text-center">E D I T &nbsp; &nbsp; D O C T O R</h4>
					</div>
					<div class="card-body">
						<form method="POST" class="row" action="../controllers/doctor_Controller.php" enctype="multipart/form-data">

							<div class="col-md-6 pb-1">
							    <label for="f_name" class="form-label">First Name</label>
							    <input type="text" name="f_name" class="form-control" id="f_name" value="<?php echo $doctor['f_name'];?>" autocomplete="off" onkeyup="checkFirstName()" onblur="checkFirstName()">
							    <span style="color:red" id="err_f_name"><?php echo $err_f_name;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="l_name" class="form-label">Last Name</label>
							    <input type="text" name="l_name" class="form-control" id="l_name" value="<?php echo $doctor['l_name']?>" autocomplete="off" onkeyup="checkLastName()" onblur="checkLastName()">
							    <span style="color:red" id="err_l_name"><?php echo $err_l_name;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="gender" class="form-label">Gender</label>
							    <select id="gender" name="gender" class="form-select" onkeyup="checkGender()" onblur="checkGender()">
				                    <option <?php if($doctor['gender'] == 'Male') echo 'selected'; ?> value="Male">Male</option>
		                    		<option <?php if($doctor['gender'] == 'Female') echo 'selected'; ?> value="Female">Female</option>
		                    		<option <?php if($doctor['gender'] == 'Other') echo 'selected'; ?> value="Other">Other</option>
							    </select>
								<span style="color:red" id="err_gender"><?php echo $err_gender;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="blood" class="form-label">Blood Type</label>
							    <select id="blood" name="blood" class="form-select" onkeyup="checkBlood()" onblur="checkBlood()">
									<option <?php if($doctor['blood_group'] == 'A+') echo 'selected'; ?> value="A+">A+</option>
									<option <?php if($doctor['blood_group'] == 'A-') echo 'selected'; ?> value="A-">A-</option>
									<option <?php if($doctor['blood_group'] == 'B+') echo 'selected'; ?> value="B">B+</option>
									<option <?php if($doctor['blood_group'] == 'B-') echo 'selected'; ?> value="B-">B-</option>
									<option <?php if($doctor['blood_group'] == 'AB+') echo 'selected'; ?> value="AB+">AB+</option>
									<option <?php if($doctor['blood_group'] == 'AB-') echo 'selected'; ?> value="AB-">AB-</option>
									<option <?php if($doctor['blood_group'] == 'O+') echo 'selected'; ?> value="O+">O+</option>
									<option <?php if($doctor['blood_group'] == 'O-') echo 'selected'; ?> value="O-">O-</option>
							    </select>
								<span style="color:red" id="err_blood"><?php echo $err_blood;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="mobile_no" class="form-label">Mobile Number</label>
							    <input type="text" name="mobile_no" class="form-control" id="phone_no" value="<?php echo $doctor['mobile_no'];?>" autocomplete="off" onkeyup="checkNumber()" onblur="checkNumber()">
							    <span style="color:red" id="err_phone_no"><?php echo $err_mobile_no;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="b_date" class="form-label">Birth Date</label>
							    <input type="date" name="b_date" class="form-control" id="b_date" value="<?php echo $doctor['birth_date'];?>" onkeyup="checkBirthDate()" onblur="checkBirthDate()">
							    <span style="color:red" id="err_b_date"><?php echo $err_b_date; ?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="email" class="form-label">Email</label>
							    <input type="text" name="email" class="form-control" id="email" value="<?php echo $doctor['email'];?>" autocomplete="off" onkeyup="checkEmail()" onblur="checkEmail()">
							    <span style="color:red" id="err_email"><?php echo $err_email;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="status" class="form-label">Status</label>
							    <select id="status" name="status" class="form-select" onkeyup="checkStatus()" onblur="checkStatus()">
				                    <option <?php if($doctor['status'] == 1 ) echo 'selected'; ?> value="1">Active</option>
				                    <option <?php if($doctor['status'] == 2 ) echo 'selected'; ?> value="2">In-Active</option>
							    </select>
								<span style="color:red" id="err_status"><?php echo $err_status;?></span>
							</div>

							<div class="col-md-6">
								<img style="height: 100px; width: 100px;" src="<?php echo $doctor['picture'];?>">
							</div>

							<div class="col-md-6 pb-1">
							    <label for="address" class="form-label">Address</label>
							    <textarea name="address" class="form-control h-25" id="address" autocomplete="off" onkeyup="checkAddress()" onblur="checkAddress()"><?php echo $doctor['address'];?></textarea>
							    <span style="color:red" id="err_address"><?php echo $err_address;?></span>
							</div>

							<div class="col-md-6">
							  	<label for="img" class="form-label">Profile Picture</label>
							    <input type="file" name="img" class="form-control" id="img" onkeyup="checkProfilePicture()" onblur="checkProfilePicture()">
							    <span style="color:red" id="err_img"><?php echo $err_img;?></span>
							</div>

							<input type="hidden" name="prev_image" value="<?php echo $doctor["picture"]?>" >
							<input type="hidden" name="id" value="<?php echo $doctor["id"]?>" >
							<input type="hidden" name="password" value="<?php echo $doctor["password"]?>" >

							<div class="col-12 pt-2 pb-1">
							    <input type="submit" name="edit_doctor" class="btn btn-primary" value="Save Changes">
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