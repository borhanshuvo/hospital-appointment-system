<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	require_once '../models/database.php';
	if(isset($_GET["req"]) && $_GET['req'] == 'add_test') 
	{
		insertTest();
	}
	elseif(isset($_POST['edit_test']))
	{
		editTest();
	}
	function getAllTest()
	{
		$query="SELECT * FROM add_test";
		$tests=get($query);
		return $tests;
	}
	function deleteTest($id)
	{
		$query="DELETE FROM add_test WHERE id=$id";
    	$test=get($query);
		return $test[0];	
	}
	function getTest($id)
	{
		$query="SELECT * FROM add_test WHERE id=$id";
		$test=get($query);
		return $test[0];
	}
	function insertTest()
	{
		$t_name=$_SESSION["t_name"];
		$t_ammount=$_SESSION['t_ammount'];
		$des=$_SESSION['des'];
		$query="INSERT INTO add_test VALUES(NULL,'$t_name','$t_ammount','$des')";
		execute($query);
		header('Location:../views/listTest.php');
		//echo $query;
		
	}
	function editTest()
	{
		$id=$_POST["id"];
		$t_name=$_POST["t_name"];
		$t_ammount=$_POST['t_ammount'];
		$description=$_POST['des'];
		$query="UPDATE add_test SET t_name='$t_name', description='$description' WHERE id=$id";
		//echo $query;
		execute($query);
		header('Location:../views/listTest.php');
	}
?>