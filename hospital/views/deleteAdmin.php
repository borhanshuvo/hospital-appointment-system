<?php 
	require_once ('../controllers/admin_Controller.php');
	  deleteAdmin($_GET['id']);
	  header('Location:../views/s_listAdmin.php');
 ?>