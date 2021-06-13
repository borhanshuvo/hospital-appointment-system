<?php
	$serverName="localhost";
	$userName="root";
	$password="";
	$dbName="hospital";

	$key=$_GET['sk'];
	$query="SELECT name ,id FROM add_department WHERE name LIKE '%$key%'";
	$conn = mysqli_connect( $serverName, $userName, $password, $dbName);
	$result=mysqli_query($conn,$query);
	echo "<table>";
	while($department = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
		    echo '<td><a href="s_printDepartment.php?id='.$department["id"].'" class="btn">'.$department["name"].'</a></td>';
		echo "</tr>";
	}				
    echo "</table>";
?>