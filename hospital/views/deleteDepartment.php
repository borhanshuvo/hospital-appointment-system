<?php 
	require_once ('../controllers/department_Controller.php');
	  deleteDepartment($_GET['id']);
	  header('Location:../views/listDepartment.php');
 ?>