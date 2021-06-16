<?php
	include_once('session_user.php');

	$id       = $_GET['id'];

	$db         = mysqli_connect("localhost", "root", "", "hospital");
	$query      = "DELETE FROM add_hospital WHERE id = '$id'";
	$department = mysqli_query($db, $query);

	header('Location:list_hospital.php');
?>