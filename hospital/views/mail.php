<!DOCTYPE html>
<html>
<head>
	<title>Mail</title>
	<link rel="stylesheet" type="text/css" href="css/mail.css">
	<link rel="icon" href="img/hospital.png" sizes="16x16" type="image/png">
</head>
<body>
	<?php 
		$name=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$msg=$_REQUEST['msg'];

		if(empty($name) || empty($email) || empty($msg))
		{
			echo "Please fill all fields";
		}
		else
		{
			mail("borhan015@gmail.com", "Hello Borhan", $msg, "From: $name <$email>");
			echo "<script type='text/javascript'>alert('Your Message Sent Successfully');
			window.history.log(-1);
			</script>";
		}
	 ?>
	<form class="contactfrom"  action="">
		<label>Name</label>
		<input type="text" name="name">
		<label>Email Address</label>
		<input type="email" name="email">
		<label>Message</label>
		<textarea name="msg"></textarea>
		<button class="submitbutton">Send</button>
	</form>
</body>
</html>