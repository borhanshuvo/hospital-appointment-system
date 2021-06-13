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
		$query="SELECT * FROM add_department";
		$departments=get($query);
		return $departments;
	}
	function deleteDepartment($id)
	{
		$query="DELETE FROM add_department WHERE id=$id";
    	$department=get($query);
		return $department[0];	
	}
	function getDepartment($id)
	{
		$query="SELECT * FROM add_department WHERE id=$id";
		$department=get($query);
		return $department[0];
	}
	function insertDepartment()
	{
		$name=$_SESSION["name"];
		$des=$_SESSION['des'];
		$query="INSERT INTO add_department VALUES(NULL,'$name','$des')";
		execute($query);
		header('Location:../views/listDepartment.php');
		//echo $query;
		
	}
	function editDepartment()
	{
		$id=$_POST["id"];
		$name=$_POST["d_name"];
		$description=$_POST['des'];
		$query="UPDATE add_department SET name='$name', description='$description' WHERE id=$id";
		//echo $query;
		execute($query);
		header('Location:../views/listDepartment.php');
	}
?>