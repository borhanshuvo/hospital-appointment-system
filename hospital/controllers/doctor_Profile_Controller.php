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
		$department=$_POST['dept'];
		$designation=$_POST['desi'];
		$qualification=$_POST['edu'];
		$specialist=$_POST['sp_list'];
		$present_address=$_POST['address'];
		$permanent_address=$_POST['address2'];
		$city=$_POST['city'];

		$u_id=$_POST['u_id'];
		$name=($f_name.' '.$l_name);
		$password=$_POST['pass'];
		$user_type='doctor';

		if(file_exists($_FILES['picture']['tmp_name']) || is_uploaded_file($_FILES['picture']['tmp_name'])) 
		{
			$target_dir="../storage/doctor_image/";
			$target_file = $target_dir . basename($_FILES["picture"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
		}

		$query="UPDATE add_Doctor SET f_name='$f_name',l_name='$l_name',gender='$gender',blood_type='$blood_type',mobile_no='$mobile_no',birth_date='$birth_date',email='$email',department='$department',designation='$designation',qualification='$qualification',specialist='$specialist',present_address='$present_address',permanent_address='$permanent_address',city='$city',picture='$target_file' WHERE id=$id";
		$query2="UPDATE login SET name='$name',email='$email',password='$password',user_type='$user_type' WHERE u_id=$u_id";
		execute($query);
		execute($query2);
		header('Location:../views/doctorProfile.php');

	}
?>