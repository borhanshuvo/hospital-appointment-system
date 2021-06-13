<?php 
	require_once ('../controllers/patient_Controller.php');
	deletePatient($_GET['id']);
	header('Location:../views/listPatient.php');
 ?>