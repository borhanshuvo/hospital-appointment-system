<?php 
	include_once('session_user.php');

	$err_d_name="";
	$d_name="";

	$err_des="";
	$des="";

	$err_status="";
	$status="";

	$has_error=false;

	if(isset($_POST['submit']))
		{
			if(empty($_POST['d_name']))
			{
				$err_d_name="Name Required";
				$has_error=true;
			}
			else
			{			
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['d_name']))
				{
					$err_d_name="You Cannot Input Numeric Value";
					$has_error=true;
					$d_name=htmlspecialchars($_POST['d_name']);
				}
				else
				{
					$d_name=htmlspecialchars($_POST['d_name']);
					$_SESSION['d_name'] = $d_name;
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
				header("Location:../controllers/department_Controller.php?req=add_dept");
			}
		}

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Department</title>
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
						<h4 class="text-center">A D D &nbsp; &nbsp; D E P A R T M E N T</h4>
					</div>
					<div class="card-body">
						<form method="POST" class="row" action="">

							<div class="col-md-6 pb-1">
							    <label for="h_name" class="form-label">Department Name</label>
							    <input type="text" name="d_name" class="form-control" id="name" value="<?php echo $d_name;?>" autocomplete="off" onkeyup="checkName()" onblur="checkName()">
							    <span style="color:red" id="err_name"><?php echo $err_d_name;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    
							</div>

							<div class="col-md-6 pb-1">
							    <label for="des" class="form-label">Department Description</label>
							    <input type="text" name="des" class="form-control" id="des" value="<?php echo $des;?>" autocomplete="off" onkeyup="checkDescription()" onblur="checkDescription()">
							    <span style="color:red" id="err_des"><?php echo $err_des;?></span>
							</div>

							<div class="col-md-6 pb-1">
							    
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