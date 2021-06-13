<?php
	$serverName="localhost";
	$userName="root";
	$password="";
	$dbName="hospital";

	$key=$_GET['sk'];
	$query="SELECT * FROM add_admin WHERE f_name LIKE '%$key%' OR l_name LIKE '%$key%' OR email LIKE '%$key%'";
	$conn = mysqli_connect( $serverName, $userName, $password, $dbName);
	$result=mysqli_query($conn,$query);
	echo "<table>";
	while($admin = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
		    echo '<td><a href="s_printAdmin.php?id='.$admin["id"].'" class="btn">'.$admin["f_name"].'</a></td>';
		    echo '<td><a href="s_printAdmin.php?id='.$admin["id"].'" class="btn">'.$admin["l_name"].'</a></td>';
		    echo '<td><a href="s_printAdmin.php?id='.$admin["id"].'" class="btn">'.$admin["email"].'</a></td>';
		echo "</tr>";
	}				
    echo "</table>";
?>