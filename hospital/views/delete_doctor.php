<?php
	include_once('session_user.php');

	$id       = $_GET['id'];

	$db         = mysqli_connect("localhost", "root", "", "hospital");
	$query      = "DELETE FROM users WHERE id = '$id'";
	$department = mysqli_query($db, $query);

	header('Location:list_doctor.php');
?>