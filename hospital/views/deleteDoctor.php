<?php 
	require_once ('../controllers/doctor_Controller.php');
	deleteDoctor($_GET['id']);
	header('Location:../views/listDoctor.php');
 ?>