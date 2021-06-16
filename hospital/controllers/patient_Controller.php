<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	require_once '../models/database.php';

	if(isset($_GET['req']) && $_GET['req'] == 'add_pat')
	{
		insertPatient();
	}

	elseif(isset($_POST['edit_patient']))
	{
		editPatient();
	}

	function insertPatient()
	{
		$f_name 	 = $_SESSION['f_name'];
		$l_name 	 = $_SESSION['l_name'];
		$gender 	 = $_SESSION['gender'];
		$blood_group = $_SESSION['blood'];
		$mobile_no   = $_SESSION['mobile_no'];
		$birth_date  = $_SESSION['b_date'];
		$email 		 = $_SESSION['email'];
		$password 	 = $_SESSION['password'];
		$address 	 = $_SESSION['address'];
		$picture     = $_SESSION['img'];
		$status      = $_SESSION['status'];
		$user_type   = 'patient';

		$query = "INSERT INTO users VALUEs(NULL, '$f_name', '$l_name', '$gender', '$blood_group', '$mobile_no', '$birth_date', '$email', '$password', '$address', '$picture', '$status', '$user_type')";
	
		execute($query);

		header('Location:../views/list_patient.php');
	}

	function editPatient()
	{
		$id          = $_POST['id'];
		$f_name 	 = $_POST['f_name'];
		$l_name 	 = $_POST['l_name'];
		$gender 	 = $_POST['gender'];
		$blood_group = $_POST['blood'];
		$mobile_no   = $_POST['mobile_no'];
		$birth_date  = $_POST['b_date'];
		$email 		 = $_POST['email'];
		$password 	 = $_POST['password'];
		$address 	 = $_POST['address'];
		$picture     = $_POST["prev_image"];
		$status      = $_POST['status'];
		$user_type   = 'patient';

		if(file_exists($_FILES['img']['tmp_name']) || is_uploaded_file($_FILES['img']['tmp_name'])) 
		{
			$target_dir="../storage/patient_image/";
			$target_file = $target_dir . basename($_FILES["img"]["name"]);
			move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
			$picture = $target_file;
		}

		$query = "UPDATE users SET f_name='$f_name', l_name='$l_name', gender='$gender', blood_group='$blood_group', mobile_no='$mobile_no', birth_date='$birth_date', email='$email', password='$password', address='$address', picture='$picture', status='$status', user_type='$user_type' WHERE id=$id";
		
		execute($query);
		
		header("Location:../views/list_patient.php");
	}
	
	

 ?>