<?php

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	require_once '../models/database.php';

	function getAllUser()
	{
		$query="SELECT * FROM login";
		$users=get($query);
		return $users;
	}

	function getUser($id)
	{
		$query="SELECT * FROM login WHERE id=$id";
		$user=get($query);
		return $user[0];
	}

	function deleteUser($id)
	{
		$query="DELETE FROM login WHERE id=$id";
    	$user=get($query);
		return $user[0];	
	}
?>