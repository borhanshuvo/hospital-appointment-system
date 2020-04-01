<?php
	require_once '../models/database.php';
	if(isset($_POST["submit"]))
	{
		insertHospital();
	}
	function getAllHospital()
	{
		$query="SELECT * FROM add_hospital";
		$hospitals=get($query);
		return $hospitals;
	}

	function getHospital($id)
	{
		$query="SELECT * FROM add_hospital WHERE id=$id";
		$hospital=get($query);
		return $hospital[0];
	}
	function insertHospital()
	{
		$name=$_POST["h_name"];
		$description=$_POST['des'];
		$email=$_POST['email'];
		$phone_no=$_POST['phone_no'];
		$address=$_POST['address'];
		$query="INSERT INTO add_hospital VALUES(NULL,'$name','$description','$email','$phone_no','$address')";
		execute($query);
		header('Location:../views/s_listHospital.php');
		
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