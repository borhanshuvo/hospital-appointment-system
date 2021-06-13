<?php
	$serverName="localhost";
	$userName="root";
	$password="";
	$dbName="hospital";

	$key=$_GET['sk'];
	$query="SELECT * FROM add_patient WHERE f_name LIKE '%$key%' OR l_name LIKE '%$key%' OR email LIKE '%$key%'";
	$conn = mysqli_connect( $serverName, $userName, $password, $dbName);
	$result=mysqli_query($conn,$query);
	echo "<table>";
	while($patient = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
		    echo '<td><a href="printPatient.php?id='.$patient["id"].'" class="btn">'.$patient["f_name"].'</a></td>';
		    echo '<td><a href="printPatient.php?id='.$patient["id"].'" class="btn">'.$patient["l_name"].'</a></td>';
		    echo '<td><a href="printPatient.php?id='.$patient["id"].'" class="btn">'.$patient["email"].'</a></td>';
		echo "</tr>";
	}				
    echo "</table>";
?>