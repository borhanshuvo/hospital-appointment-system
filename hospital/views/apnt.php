<html>
	<head>
	<link rel='stylesheet' href='css/apoint.css'>
	</head>
		<body>
			<div class='filter'>
		
			</div>
			<table>
				<tr>
				
					<th>ID</th>
					<th>Name</th>
					<th>Department</th>
					<th>Fess</th>
					<th>Time</th>
					<th>For Appoiment</th>
					
				</tr>
				<?php
								$a[]='';
								$b[]='';
								$c[]='';
								$d[]='';
								$d[]='';
								$e[]='';
								$xml=simplexml_load_file("Doctorlist.xml");
								$data=$xml->dept;
								for($i=0;$i<count($xml->dept);$i++)
								{
									$a[$i]=$data[$i]->id;
									$b[$i]= $data[$i]->name;
									$c[$i]= $data[$i]->department;
									$d[$i]=$data[$i]->fess;
									$e[$i]=$data[$i]->tm;	
								}
                for($j=0;$j<$i;$j++)
				{				
                 ?>
				
				<tr>
					<td><?php echo $a[$j]; ?></td>
					<td><a href="#"><?php echo $b[$j]; ?></a></td>
					<td><?php echo $c[$j]; ?></td>
					<td><?php echo $d[$j]; ?></td>
					<td><?php echo $e[$j]; ?></td>
					
					<td><button class='btn'>Appoiment</td>
				</tr>
				<?php }?>								
				
							
			</table>
		
			
			
			
		</body>
</html>