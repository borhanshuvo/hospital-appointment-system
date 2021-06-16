<?php 

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	if (isset($_SESSION['user_types']))
	{
		session_destroy();
		setcookie("loggedinuser","",time()-60);
		header("Location:login.php");
	}
	else
	{
		header("Location:login.php");
	}

?>