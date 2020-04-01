<?php
	require_once '../models/database.php';
	if(isset($_POST["submit"]))
	{
		insertDepartment();
	}
	function getAllDepartment()
	{
		$query="SELECT * FROM add_department";
		$departments=get($query);
		return $departments;
	}

	function getDepartment($id)
	{
		$query="SELECT * FROM add_department WHERE id=$id";
		$department=get($query);
		return $department[0];
	}
	function insertDepartment()
	{
		$name=$_POST["d_name"];
		$des=$_POST['des'];
		$query="INSERT INTO add_department VALUES(NULL,'$name','$des')";
		execute($query);
		header('Location:../views/listDepartment.php');
		
	}
	function editCategory()
	{
		$name=$_POST["name"];
		$id=$_POST["id"];
		$query="UPDATE categories SET name='$name' WHERE id=$id";
		execute($query);
		header('Location:../views/allcategories.php');
	}
?>