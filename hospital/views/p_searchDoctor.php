<?php
	$serverName="localhost";
	$userName="root";
	$password="";
	$dbName="hospital";

	$key=$_GET['sk'];
	$query="SELECT * FROM add_Doctor WHERE f_name LIKE '%$key%' OR l_name LIKE '%$key%' OR email LIKE '%$key%'";
	$conn = mysqli_connect( $serverName, $userName, $password, $dbName);
	$result=mysqli_query($conn,$query);
	echo "<table>";
	while($doctor = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
		    echo '<td><a href="p_printDoctor.php?id='.$doctor["id"].'" class="btn">'.$doctor["f_name"].' '.$doctor["l_name"].'</a></td>';
		    //echo '<td><a href="printDoctor.php?id='.$doctor["id"].'" class="btn">'.$doctor["l_name"].'</a></td>';
		    echo '<td><a href="p_printDoctor.php?id='.$doctor["id"].'" class="btn">'.$doctor["email"].'</a></td>';
		echo "</tr>";
	}				
    echo "</table>";
?>