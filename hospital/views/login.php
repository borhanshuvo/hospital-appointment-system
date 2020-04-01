<?php
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
					header("location:super_admin.php");
				}
				elseif($status=='admin')
				{
					header("location:admin.php");
				}
				elseif($status=='patient')
				{
					header("location:apnt.php");
				}
				else
				{
					header("location:listDepartment.php");
				}

			}
			else
			{
				$err_invalid="Invalid Username Password";
			}
		}
		else
		{
			$err_invalid="Invalid Username Password";
		}
			

		
		
	}
?>

<html>
	<center>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/loginstyle.css">

	</head> 
	<body>
		<div class="login-box">
			<img src="img/login.png" class="avater">
			<h6>Login Here</h6>
			<form method="post" action="">
		
						<div class="textbox">
							<input type="email" placeholder="Email" value="<?php echo $uname;?>" name="uname">
							<span style="color:red"><?php echo $err_uname;?></span>
						</div>
					
				
						<div class="textbox">
							<input type="password" placeholder="Password" value="<?php echo $pass;?>" name="pass">
						<span style="color:red"><?php echo $err_pass;?></span>
						</div>
						
					
					<input class="btn" type="submit" value="Sign In" name="submit">
					<center><a href="">Forget Password</a></center>
				
		    </form>
		    <span><?php echo $err_invalid;?></span>
		</div>
	</body>
	</center>
</html>