<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	require_once '../models/database.php';
	if(isset($_POST['submit']))
	{
		insertHospital();
	}
	elseif(isset($_POST['edit_hospital']))
	{
		editHospital();
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
	function deleteHospital($id)
	{
		$query="DELETE FROM add_hospital WHERE id=$id";
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
	function editHospital()
	{
		$id=$_POST['id'];
		$name=$_POST["h_name"];
		$description=$_POST['des'];
		$email=$_POST['email'];
		$phone_no=$_POST['phone_no'];
		$address=$_POST['address'];
		$query="UPDATE add_hospital SET name='$name',description='$description',email='$email',phone_no='$phone_no',address='$address' WHERE id=$id";
		//echo $query;
		execute($query);
		header('Location:../views/s_listHospital.php');
	}
?>