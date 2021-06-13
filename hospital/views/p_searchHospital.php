<?php
	$serverName="localhost";
	$userName="root";
	$password="";
	$dbName="hospital";
	
	$key = $_GET['sk'];
	$query = "SELECT name ,id FROM add_hospital WHERE name LIKE '%$key%'";
	$conn = mysqli_connect( $serverName, $userName, $password, $dbName);
	$result = mysqli_query($conn,$query);
	echo "<table>";
	while($hospital = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
		    echo '<td><a href="p_printHospital.php?id='.$hospital["id"].'" class="btn">'.$hospital["name"].'</a></td>';
		echo "</tr>";				
    }
    echo "</table>";
?>