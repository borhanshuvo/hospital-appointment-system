<?php 
	include_once('session_user.php');

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

	$has_error=false;

	if(isset($_POST['submit']))
		{
			if(empty($_POST['h_name']))
			{
				$err_h_name="Name Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['h_name']))
				{
					$err_h_name="You Can Input Only latter";
					$has_error=true;
					$h_name=htmlspecialchars($_POST['h_name']);
				}
				else
				{
					$h_name=htmlspecialchars($_POST['h_name']);
					$_SESSION['h_name'] = $h_name;
				}
			}

			if(empty($_POST['des']))
			{
				$err_des="Description Required";
				$has_error=true;
			}
			else
			{
				$des=htmlspecialchars($_POST['des']);
				$_SESSION['des'] = $des;
			}

			if(empty($_POST['email']))
			{
				$err_email="Email Required";
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
					foreach($hospitals as $hospital)
					{
						$v_email = $hospital["email"];
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
			}

			if(empty($_POST['phone_no']))
			{
				$err_phone_no="Phone Number Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[0-9]*$/", $_POST['phone_no']))
				{
					$err_phone_no="You Can Input Only Numeric Value";
					$has_error=true;
					$phone_no=htmlspecialchars($_POST['phone_no']);
				}
				else
				{
					if(strlen($_POST['phone_no']) < 11)
					{
						$err_phone_no="Mobile Number Too Short";
						$has_error=true;
						$phone_no=htmlspecialchars($_POST['phone_no']);
					}
					else
					{
						foreach($hospitals as $hospital)
						{
							$v_phone_no = $hospital["phone_no"];
							if($v_phone_no == $_POST['phone_no'])
							{
								$err_phone_no="Already Use This Phone Number";
								$has_error=true;
								$phone_no=htmlspecialchars($_POST['phone_no']);
							}
							else
							{
								$phone_no=htmlspecialchars($_POST['phone_no']);
								$_SESSION['phone_no'] = $phone_no;
							}
						}		
					}
				}
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

			if(!$has_error)
			{
				header("Location:../controllers/hospital_Controller.php?req=add_hos");
			}
		}

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Hospital</title>
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
						<h4 class="text-center">A D D &nbsp; &nbsp; H O S P I T A L</h4>
					</div>
					<div class="card-body">
						<form method="POST" class="row" action="">

							<div class="col-md-6 pb-1">
							    <label for="h_name" class="form-label">Hospital Name</label>
							    <input type="text" name="h_name" class="form-control" id="name" value="<?php echo $h_name;?>" autocomplete="off" onkeyup="checkName()" onblur="checkName()">
							    <span style="color:red" id="err_name"><?php echo $err_h_name;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="des" class="form-label">Hospital Description</label>
							    <input type="text" name="des" class="form-control" id="des" value="<?php echo $des;?>" autocomplete="off" onkeyup="checkDescription()" onblur="checkDescription()">
							    <span style="color:red" id="err_des"><?php echo $err_des;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="email" class="form-label">Hospital Email</label>
							    <input type="text" name="email" class="form-control" id="email" value="<?php echo $email;?>" autocomplete="off" onkeyup="checkEmail()" onblur="checkEmail()">
							    <span style="color:red" id="err_email"><?php echo $err_email;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="phone_no" class="form-label">Hospital Mobile No</label>
							    <input type="text" name="phone_no" class="form-control" id="phone_no" value="<?php echo $phone_no;?>" autocomplete="off" onkeyup="checkNumber()" onblur="checkNumber()">
							    <span style="color:red" id="err_phone_no"><?php echo $err_phone_no;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    <label for="address" class="form-label">Hospital Address</label>
							    <textarea name="address" class="form-control h-25" id="address" autocomplete="off" onkeyup="checkAddress()" onblur="checkAddress()"><?php echo $address;?></textarea>
							    <span style="color:red" id="err_address"><?php echo $err_address;?></span>
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