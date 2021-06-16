<?php

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	require_once '../models/database.php';

	function getAllUser()
	{
		$query = "SELECT * FROM users";
		$users = get($query);
		return $users;
	}

	function getUser($id)
	{
		$query = "SELECT * FROM users WHERE id=$id";
		$user  = get($query);
		return $user[0];
	}
?>