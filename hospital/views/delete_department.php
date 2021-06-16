 <?php
	include_once('session_user.php');

	$d_id       = $_GET['id'];

	$db         = mysqli_connect("localhost", "root", "", "hospital");
	$query      = "DELETE FROM add_department WHERE id = '$d_id'";
    $department = mysqli_query($db, $query);

	header('Location:list_department.php');
 ?>