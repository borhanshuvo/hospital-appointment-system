<?php 
	require_once '../models/database.php';
	if(isset($_POST['submit']))
	{
		insertDoctor();
	}

	function insertDoctor()
	{
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
		$name=($f_name.' '.$l_name);
		$password=$_POST['pass'];
		$user_type='doctor';
		$query="INSERT INTO add_Doctor VALUEs(NULL,'$f_name','$l_name','$gender','$blood_type','$mobile_no','$birth_date','$email','$department','$designation','$qualification','$specialist','$present_address','$permanent_address','$city')";
		$query2="INSERT INTO login VALUEs(NULL,'$name','$email','$password','$user_type')";
		execute($query);
		execute($query2);
		header('Location:../views/addDoctor.php');
	}
	
	function getAllDoctor()
	{
		$query="SELECT * FROM add_Doctor";
		$doctors=get($query);
		return $doctors;
	} 

 ?>