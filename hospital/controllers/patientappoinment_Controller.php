<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	require_once '../models/database.php';
	require_once ('../controllers/doctor_Controller.php');

	$did = $_SESSION['z_id'];
	$doctor = getDoctor($did);
	$d_id = $doctor['id'];
	$df_name = $doctor['f_name'];
	$dl_name = $doctor['l_name'];

	$z_email = $_SESSION['z_email'];
	include_once '../controllers/patient_Controller.php';
	$patients=getAllPatient();
	foreach ($patients as $patient)
	{
		$v_email = $patient["email"];
		//echo $v_email;
		if($v_email == $z_email)
		{
			$p_id = $patient['id'];
			$pf_name = $patient['f_name'];
			$pl_name = $patient['l_name'];
		}
	}
	function getAllAppoints()
	{
		$query="SELECT * FROM appointment";
		$apoints=get($query);
		return $apoints;
	}
	function insert()
	{
		$df_name=$GLOBALS['df_name'];
		$dl_name=$GLOBALS['dl_name'];
		$d_id=$GLOBALS['d_id'];
		$pf_name=$GLOBALS['pf_name'];
		$pl_name=$GLOBALS['pl_name'];
		$p_id=$GLOBALS['p_id'];
		$Status="Pending";
	
		$query="INSERT INTO appointment VALUES ('$df_name','$dl_name','$pf_name','$pl_name',$d_id,$p_id,'$Status')";
		execute($query);		
		header('Location:../views/bookAppointment.php');
	}
	function getlist()
	{
		$d_id=$GLOBALS['d_id'];
		$p_id=$GLOBALS['p_id'];
		$query="SELECT * FROM `appointment` WHERE d_id=$d_id OR p_id=$p_id ";
		$list=get($query);
		return $list;
	}
	function cancel()
	{
		$d_id=$GLOBALS['d_id'];
		$p_id=$GLOBALS['p_id'];
		$query="DELETE FROM appointment WHERE d_id=$d_id OR p_id=$p_id ";
		execute($query);
		header('Location:../views/bookAppointment.php');
	}
	  
	function updateat($id)
	{		
			$id=$id;
			$Status='Accept';
			$query="UPDATE `appointment` SET Status='$Status' WHERE p_id='$id'";
			execute($query);
			//echo $query;	
	}
	function updatert($id)
	{
		$id=$id;
		$Status='Reject';
		$query="UPDATE `appointment` SET Status='$Status' WHERE p_id='$id'";
		execute($query);
	}

 ?>