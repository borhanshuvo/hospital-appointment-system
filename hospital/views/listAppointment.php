<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../index.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-60);
		header("Location:../index.php");
	}

	$z_email = $_SESSION['z_email'];

	include_once '../controllers/login_Controller.php';
	$users=getAllUser();
	include_once '../controllers/patient_Controller.php';
	$patients=getAllPatient();
	foreach ($patients as $patient)
					{
						$v_email = $patient["email"];
						//echo $v_email;
						if($v_email == $z_email)
						{
							echo $patient['id'];


						}
					}
 ?>