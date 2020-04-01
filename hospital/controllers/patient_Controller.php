<?php 
	require_once '../models/database.php';
	if(isset($_POST['submit']))
	{
		insertPatient();
	}

	function insertPatient()
	{
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
		$name=($f_name.' '.$l_name);
		$password=$_POST['pass'];
		$user_type='patient';
		$query="INSERT INTO add_patient VALUEs(NULL,'$f_name','$l_name','$gender','$blood_type','$mobile_no','$birth_date','$email','$present_address','$permanent_address','$city')";
		$query2="INSERT INTO login VALUEs(NULL,'$name','$email','$password','$user_type')";
		execute($query);
		execute($query2);
		header('Location:../views/addPatient.php');
	}
	
	function getAllPatient()
	{
		$query="SELECT * FROM add_patient";
		$patients=get($query);
		return $patients;
	} 

 ?>