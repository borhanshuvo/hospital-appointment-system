<?php

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	require_once '../models/database.php';
	
	if(isset($_POST['edit_profile']))
	{
		editProfile();
	}
	function getAllSuperAdmin()
	{
		$query="SELECT * FROM super_admin";
		$super_admins=get($query);
		return $super_admins;
	}
	function editProfile()
	{
		$target_file=$_POST["prev_image"];
		$id=$_POST['id'];
		$f_name=$_POST['f_name'];
		$l_name=$_POST['l_name'];
		$gender=$_POST['gender'];
		$blood_type=$_POST['blood'];
		$mobile_no=$_POST['mobile_no'];
		$birth_date=$_POST['b_date'];
		$email=$_POST['email'];
		$password=$_POST['pass'];
		$present_address=$_POST['address'];
		$permanent_address=$_POST['address2'];
		$city=$_POST['city'];

		$u_id=$_POST['u_id'];
		$name=($f_name.' '.$l_name);
		$user_type='super_admin';

		if(file_exists($_FILES['picture']['tmp_name']) || is_uploaded_file($_FILES['picture']['tmp_name'])) 
		{
			$target_dir="../storage/super_admin_image/";
			$target_file = $target_dir . basename($_FILES["picture"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
		}
		$query="UPDATE super_admin SET f_name='$f_name',l_name='$l_name',gender='$gender',blood_type='$blood_type',mobile_no='$mobile_no',birth_date='$birth_date',email='$email',present_address='$present_address',permanent_address='$permanent_address',city='$city',picture='$target_file' WHERE id=$id";
		$query2="UPDATE login SET name='$name',email='$email',password='$password',user_type='$user_type' WHERE u_id=$u_id";
		echo $query2;
		execute($query);
		execute($query2);
		header("Location:../views/super_adminProfile.php");
	}
?>