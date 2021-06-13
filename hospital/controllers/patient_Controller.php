<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	require_once '../models/database.php';
	if(isset($_GET['req']) && $_GET['req'] == 'add_pat')
	{
		insertPatient();
	}
	elseif(isset($_POST['edit_patient']))
	{
		editPatient();
	}
	function getAllPatient()
	{
		$query="SELECT * FROM add_patient";
		$patients=get($query);
		return $patients;
	}
	function getPatient($id)
	{
		$query="SELECT * FROM add_patient WHERE id=$id";
		$patient=get($query);
		return $patient[0];
	}
	function deletePatient($id)
	{
		$query="DELETE FROM add_patient WHERE id=$id";
    	$patient=get($query);
		return $patient[0];	
	} 
	function insertPatient()
	{
		$f_name=$_SESSION['f_name'];
		$l_name=$_SESSION['l_name'];
		$gender=$_SESSION['gender'];
		$blood_type=$_SESSION['blood'];
		$mobile_no=$_SESSION['mobile_no'];
		$birth_date=$_SESSION['b_date'];
		$email=$_SESSION['email'];
		$present_address=$_SESSION['address'];
		$permanent_address=$_SESSION['address2'];
		$city=$_SESSION['city'];

		$name=($f_name.' '.$l_name);
		$password=$_SESSION['pass'];
		$user_type='patient';

		$target_file= $_SESSION['img'];

		$query="INSERT INTO add_patient VALUEs(NULL,'$f_name','$l_name','$gender','$blood_type','$mobile_no','$birth_date','$email','$present_address','$permanent_address','$city','$target_file')";
		$query2="INSERT INTO login VALUEs(NULL,'$name','$email','$password','$user_type')";
		execute($query);
		execute($query2);
		header('Location:../views/addPatient.php');
	}
	function editPatient()
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
		$present_address=$_POST['address'];
		$permanent_address=$_POST['address2'];
		$city=$_POST['city'];

		$u_id=$_POST['u_id'];
		$name=($f_name.' '.$l_name);
		$password=$_POST['pass'];
		$user_type='patient';
		
		if(file_exists($_FILES['picture']['tmp_name']) || is_uploaded_file($_FILES['picture']['tmp_name'])) 
		{
			$target_dir="../storage/patient_image/";
			$target_file = $target_dir . basename($_FILES["picture"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
		}

		$query="UPDATE add_patient SET f_name='$f_name',l_name='$l_name',gender='$gender',blood_type='$blood_type',mobile_no='$mobile_no',birth_date='$birth_date',email='$email',present_address='$present_address',permanent_address='$permanent_address',city='$city',picture='$target_file' WHERE id=$id";
		$query2="UPDATE login SET name='$name',email='$email',password='$password',user_type='$user_type' WHERE u_id=$u_id";
		execute($query);
		execute($query2);
		header('Location:../views/listPatient.php');
	}
	
	

 ?>