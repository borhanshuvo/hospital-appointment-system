<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	require_once '../models/database.php';

	if(isset($_GET["req"]) && $_GET['req'] == 'add_dept') 
	{
		insertDepartment();
	}

	elseif(isset($_POST['edit_department']))
	{
		editDepartment();
	}

	function getAllDepartment()
	{
		$query       = "SELECT * FROM add_department";
		$departments = get($query);
		return $departments;
	}

	function getDepartment($id)
	{
		$query      = "SELECT * FROM add_department WHERE id=$id";
		$department = get($query);
		return $department[0];
	}

	function insertDepartment()
	{
		$name   = $_SESSION["d_name"];
		$des    = $_SESSION['des'];
		$status = $_SESSION['status'];

		$query = "INSERT INTO add_department VALUES(NULL,'$name','$des', '$status')";

		execute($query);

		header('Location:../views/list_department.php');	
	}

	function editDepartment()
	{
		$id          = $_POST["id"];
		$name        = $_POST["d_name"];
		$description = $_POST['des'];
		$status      = $_POST['status'];

		$query = "UPDATE add_department SET name='$name', description='$description', status='$status' WHERE id=$id";

		execute($query);

		header('Location:../views/list_department.php');
	}
?>