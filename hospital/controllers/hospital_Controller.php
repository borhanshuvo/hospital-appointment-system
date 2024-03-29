<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	require_once '../models/database.php';
	
	if(isset($_GET['req']) && $_GET['req'] == 'add_hos')
	{
		insertHospital();
	}

	elseif(isset($_POST['edit_hospital']))
	{
		editHospital();
	}
	
	function getAllHospital()
	{
		$query     = "SELECT * FROM add_hospital";
		$hospitals = get($query);
		return $hospitals;
	}

	function getHospital($id)
	{
		$query    = "SELECT * FROM add_hospital WHERE id=$id";
		$hospital = get($query);
		return $hospital[0];
	}

	function insertHospital()
	{
		$name        = $_SESSION["h_name"];
		$description = $_SESSION['des'];
		$email       = $_SESSION['email'];
		$phone_no    = $_SESSION['phone_no'];
		$address     = $_SESSION['address'];
		$status      = $_SESSION['status'];

		$query       = "INSERT INTO add_hospital VALUES(NULL,'$name','$description','$email','$phone_no','$address', '$status')";

		execute($query);

		header('Location:../views/list_hospital.php');
		
	}

	function editHospital()
	{
		$id          = $_POST['id'];
		$name        = $_POST["h_name"];
		$description = $_POST['des'];
		$email       = $_POST['email'];
		$phone_no    = $_POST['phone_no'];
		$address     = $_POST['address'];
		$status      = $_POST['status'];

		$query       = "UPDATE add_hospital SET name='$name',description='$description',email='$email',phone_no='$phone_no',address='$address', status='$status' WHERE id=$id";

		execute($query);

		header('Location:../views/list_hospital.php');
	}
?>