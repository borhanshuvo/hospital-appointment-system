<?php 
	require_once ('../controllers/hospital_Controller.php');
	deleteHospital($_GET['id']);
	header('Location:../views/s_listHospital.php');
 ?>