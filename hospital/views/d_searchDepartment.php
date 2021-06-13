<?php
	$serverName="localhost";
	$userName="root";
	$password="";
	$dbName="hospital";

	$key=$_GET['sk'];
	$conn = mysqli_connect( $serverName, $userName, $password, $dbName);

	$query="SELECT name ,id FROM add_department WHERE name LIKE '%$key%'";
    $result=mysqli_query($conn,$query);
?>
<table>
	<?php
		while($department = mysqli_fetch_assoc($result))
        {
           echo "<tr>";
		        echo '<td><a href="d_printDepartment.php?id='.$department["id"].'" class="btn">'.$department["name"].'</a></td>';
		   echo "</tr>";				
        }
	?>
</table>
