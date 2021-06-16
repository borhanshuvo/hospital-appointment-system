<?php 
	include_once('session_user.php');

	$d_id = $_GET['id'];
	$department = getDepartment($d_id);

	$err_d_name="";
	$d_name="";

	$des="";
	$err_des="";

	$err_status="";
	$status="";

 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Edit Department</title>
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
						<h4 class="text-center">E D I T &nbsp; &nbsp; D E P A R T M E N T</h4>
					</div>
					<div class="card-body">
						<form method="POST" class="row" action="../controllers/department_Controller.php">

							<div class="col-md-6 pb-1">
							    <label for="name" class="form-label">Department Name</label>
							    <input type="text" name="d_name" class="form-control" id="name" value="<?php echo $department["name"];?>" autocomplete="off" onkeyup="checkName()" onblur="checkName()">
							    <span style="color:red" id="err_name"><?php echo $err_d_name;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    
							</div>

							<div class="col-md-6 pb-1">
							    <label for="des" class="form-label">Department Description</label>
							    <input type="text" name="des" class="form-control" id="des" value="<?php echo $department["description"];?>" autocomplete="off" onkeyup="checkDescription()" onblur="checkDescription()">
							    <span style="color:red" id="err_des"><?php echo $err_des;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    
							</div>

							<div class="col-md-6 pb-1">
							    <label for="status" class="form-label">Status</label>
							    <select id="status" name="status" class="form-select" onkeyup="checkStatus()" onblur="checkStatus()">
				                    <option <?php if($department['status'] == 1 ) echo 'selected'; ?> value="1">Active</option>
				                    <option <?php if($department['status'] == 2 ) echo 'selected'; ?> value="2">In-Active</option>
							    </select>
								<span style="color:red" id="err_status"><?php echo $err_status;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    
							</div>

							<input type="hidden" name="id" value="<?php echo $department["id"]?>" >

							<div class="col-12 pt-2 pb-1">
							    <input type="submit" name="edit_department" class="btn btn-primary" value="Save Changes">
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