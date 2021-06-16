<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	$email="";
	$err_email="";

	$password="";
	$err_password="";

	$err_msg="";
	$has_error=false;

	if(isset($_POST['submit']))
	{	
		if(empty($_POST['email']))
		{
			$err_email="*Email Required";
			$has_error=true;
		}
		else
		{
			$email=$_POST['email'];
		}

		if(empty($_POST['password']))
		{
			$err_password="*Password Required";
			$has_error=true;
		}
		else 
		{
			$password=$_POST['password'];
		}

		if(!$has_error)
		{
			require_once '../controllers/user_Controller.php';
			$users = getAllUser();
			
			foreach($users as $user)
            {
            	$password = sha1($_POST['password']);

            	if ( $_POST['email'] == $user["email"] && $password == $user["password"] ) 
            	{
            		$user_type = $user["user_type"];
            		$status    = $user["status"];
            		if ( $user_type == 'super_admin' )
            		{
            			$f_name                 = $user["f_name"];
            			$l_name                 = $user["l_name"];
            			$full_name              = $f_name.' '.$l_name;
            			$_SESSION['name']       = $full_name;
            			$_SESSION['user_types'] = $user_type;
            			$email                  = $user["email"];
						setcookie("loggedinuser",$email,time()+18000);
            			header("location:dashboard.php");
            		}

					elseif( $user_type == 'admin' && $status == 1)
					{
            			$f_name                 = $user["f_name"];
            			$l_name                 = $user["l_name"];
            			$full_name              = $f_name.' '.$l_name;
            			$_SESSION['name']       = $full_name;
            			$_SESSION['user_types'] = $user_type;
            			$email                  = $user["email"];
						setcookie("loggedinuser",$email,time()+18000);
            			header("location:dashboard.php");
            		}

					elseif( $user_type == 'doctor' && $status == 1)
					{
            			$f_name                 = $user["f_name"];
            			$l_name                 = $user["l_name"];
            			$full_name              = $f_name.' '.$l_name;
            			$_SESSION['name']       = $full_name;
            			$_SESSION['user_types'] = $user_type;
            			$email                  = $user["email"];
						setcookie("loggedinuser",$email,time()+18000);
            			header("location:dashboard.php");
            		}

            		elseif( $user_type == 'patient' && $status == 1)
					{
            			$f_name                 = $user["f_name"];
            			$l_name                 = $user["l_name"];
            			$full_name              = $f_name.' '.$l_name;
            			$_SESSION['name']       = $full_name;
            			$_SESSION['user_types'] = $user_type;
            			$email                  = $user["email"];
						setcookie("loggedinuser",$email,time()+18000);
            			header("location:dashboard.php");
            		}

					else
					{
						$err_msg = "* User Not Exits";
					}
            	} 
            	else
				{
					$err_msg="*Username or Password Incorrect";
				}
                
            } 
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<?php include_once('css/bootstrap.php'); ?>
	</head> 
	<body>
		<?php include_once('home_header.php'); ?>
		<main>
			
			<div class="container d-flex justify-content-center card w-50">
				<div class="card-header">
					<h4 class="text-center">Login</h4>
				</div>

				<form action="" method="POST" class="row">

				<div class="card-body">
					
				  <div class="col-12 pb-1">
				    <label for="email" class="form-label">Email</label>
				    <input type="email" name="email" class="form-control" id="email" value="<?php echo $email;?>" autocomplete="off" onkeyup="checkEmail()" onblur="checkEmail()">
				    <span style="color:red" id="err_email"><?php echo $err_email;?></span>
				  </div>

				   <div class="col-12 pb-2">
				    <label for="password" class="form-label">Password</label>
				    <input type="password" name="password" class="form-control" id="password" autocomplete="off" onkeyup="checkPassword()" onblur="checkPassword()">
				    <span style="color:red" id="err_password"><?php echo $err_password;?></span>
				  </div>
				  <div class="col-12 pb-1">
				  	<input type="checkbox" onclick="passwordShow()"> Show Password
				  </div>

				</div>

				<div class="card-footer">
					<div class="col-12 d-flex justify-content-end">
					    <input type="submit" name="submit" class="btn btn-primary" value="Sign In">
					</div>
					<span style="color:red"><?php echo $err_msg;?></span>
				</div>

				</form>
			</div>

		</main>
		<?php include_once('js/javascript.php'); ?>
	</body>
</html>