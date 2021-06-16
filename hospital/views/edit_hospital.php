<?php 
	include_once('session_user.php');

	require_once ('../controllers/hospital_Controller.php');
	$hid = $_GET['id'];
	$hospital = getHospital($hid);

	$err_h_name="";
	$h_name="";

	$des="";
	$err_des="";

	$email="";
	$err_email="";

	$phone_no="";
	$err_phone_no="";

	$address="";
	$err_address="";

	$err_status="";
	$status="";
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Edit Hospital</title>
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
						<h4 class="text-center">E D I T &nbsp; &nbsp; H O S P I T A L</h4>
					</div>
					<div class="card-body">
						<form method="POST" class="row" action="../controllers/hospital_Controller.php">

							<div class="col-md-6 pb-1">
							    <label for="h_name" class="form-label">Hospital Name</label>
							    <input type="text" name="h_name" class="form-control" id="name" value="<?php echo $hospital["name"];?>" autocomplete="off" onkeyup="checkName()" onblur="checkName()">
							    <span style="color:red" id="err_name"><?php echo $err_h_name;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="des" class="form-label">Hospital Description</label>
							    <input type="text" name="des" class="form-control" id="des" value="<?php echo $hospital["description"];?>" autocomplete="off" onkeyup="checkDescription()" onblur="checkDescription()">
							    <span style="color:red" id="err_des"><?php echo $err_des;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="email" class="form-label">Hospital Email</label>
							    <input type="text" name="email" class="form-control" id="email" value="<?php echo $hospital["email"];?>" autocomplete="off" onkeyup="checkEmail()" onblur="checkEmail()">
							    <span style="color:red" id="err_email"><?php echo $err_email;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="phone_no" class="form-label">Hospital Mobile No</label>
							    <input type="text" name="phone_no" class="form-control" id="phone_no" value="<?php echo $hospital["phone_no"];?>" autocomplete="off" onkeyup="checkNumber()" onblur="checkNumber()">
							    <span style="color:red" id="err_phone_no"><?php echo $err_phone_no;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="address" class="form-label">Hospital Address</label>
							    <textarea name="address" class="form-control h-25" id="address" autocomplete="off" onkeyup="checkAddress()" onblur="checkAddress()"><?php echo $hospital["address"];?></textarea>
							    <span style="color:red" id="err_address"><?php echo $err_address;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="status" class="form-label">Status</label>
							    <select id="status" name="status" class="form-select" onkeyup="checkStatus()" onblur="checkStatus()">
				                    <option <?php if($hospital['status'] == 1 ) echo 'selected'; ?> value="1">Active</option>
				                    <option <?php if($hospital['status'] == 2 ) echo 'selected'; ?> value="2">In-Active</option>
							    </select>
								<span style="color:red" id="err_status"><?php echo $err_status;?></span>
							</div>

							<input type="hidden" name="id" value="<?php echo $hospital["id"]?>" >

							<div class="col-12 pt-2 pb-1">
							    <input type="submit" name="edit_hospital" class="btn btn-primary" value="Save Changes">
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