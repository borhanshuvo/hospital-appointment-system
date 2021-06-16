<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if(!isset($_COOKIE['loggedinuser']))
    {
        header("Location:login.php");
    }
    
    $c_email           = $_COOKIE['loggedinuser'];
    $_SESSION['email'] = $c_email;
    $email             = $_SESSION['email'];

    require_once '../controllers/user_Controller.php';
    $users = getAllUser();

    require_once '../controllers/hospital_Controller.php';
    $hospitals = getAllHospital();

    require_once '../controllers/department_Controller.php';
    $departments = getAllDepartment();
?>