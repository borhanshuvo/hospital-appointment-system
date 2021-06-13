<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	include '../models/database.php';
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$err_invalid="";
	$has_error=false;

	if(isset($_POST['submit']))
	{	
		if(empty($_POST['uname']))
		{
			$err_uname="*Username Required";
			$has_error=true;
		}
		else
		{
			$uname=$_POST['uname'];
		}
		if(empty($_POST['pass']))
		{
			$err_pass="*Password Required";
			$has_error=true;
		}
		else
		{
			$pass=$_POST['pass'];
		}
		if(!$has_error)
		{
			$query="SELECT * FROM login WHERE email='$uname' AND password='$pass'";
			$result=get($query);
			
			if(count($result)>0)
			{
				$rs=$result[0];
				$status=$rs['user_type'];
				if($status=='super_admin')
				{
					$email = $rs['email'];
					setcookie("loggedinuser",$rs['email'],time()+18000);
					header("location:super_admin.php?email=$email");
				}
				elseif($status=='admin')
				{
					$email = $rs['email'];
					setcookie("loggedinuser",$rs['email'],time()+18000);
					header("location:admin.php?email=$email");
				}
				elseif($status=='doctor')
				{
					$email = $rs['email'];
					setcookie("loggedinuser",$rs['email'],time()+18000);
					header("location:doctor.php?email=$email");
				}
				else
				{
					$email = $rs['email'];
					setcookie("loggedinuser",$rs['email'],time()+18000);
					header("location:patient.php?email=$email");
				}

			}
			else
			{
				$err_invalid="** Invalid Username or Password **";
			}
		}
	}
?>

<html>
	<center>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
		<link rel="icon" href="img/hospital.png" sizes="16x16" type="image/png">
	</head> 
	<body>
		<div class="login-box">
			<img src="img/login.png" class="avater">
			<h6>Login Here</h6>
			<form method="post" action="">
				<div class="textbox">
					<input type="email" placeholder="Email" value="<?php echo $uname;?>" name="uname">		
				</div>
					<span style="color:red"><?php echo $err_uname;?></span>
				<div class="textbox">
					<input type="password" placeholder="Password" value="<?php echo $pass;?>" name="pass">
				</div>
					<span style="color:red"><?php echo $err_pass;?></span>
					<input class="btn" type="submit" value="Sign In" name="submit">
					<center><a href="formPatient.php">Don't Have Account</a></center>
		    </form>
		    	<span style="color:red"><?php echo $err_invalid;?></span>
		</div>
	</body>
	</center>
</html>