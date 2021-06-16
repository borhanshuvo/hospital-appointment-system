<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

			<h4 class="text-center pt-2">D E P A R T M E N T &nbsp; &nbsp; L I S T</h4>
				<div class="table-responsive">
					<table class="table text-center table-hover">
					  <thead class="table-dark">
					    <tr>
							<th scope="col">#SL</th>
					        <th scope="col">Name</th>					
							<th scope="col">Status</th>
							<th scope="col">Action</th>
					    </tr>
					  </thead>
					  <?php
						include_once('session_user.php');
						
						$key        = $_GET['sk'];
						$serverName = "localhost";
						$userName   = "root";
						$password   = "";
						$dbName     = "hospital";

						$conn  = mysqli_connect( $serverName, $userName, $password, $dbName);
						$query = "SELECT * FROM add_department WHERE name LIKE '%$key%'";

					    $result=mysqli_query($conn,$query);

					    $i = 0;
						while($department = mysqli_fetch_assoc($result))
						{
							$id      		= $department["id"];
							$name     		= $department["name"];
							$description    = $department["description"];
							$status         = $department['status'];
							$i++;
						?>
						<tbody>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $name; ?></td>
							<td><?php
									if($status == 1)
									{ ?>
										<span class="badge bg-success">Active</span>
							<?php   }
									else
									{ ?>
										<span class="badge bg-danger">In-Active</span>
							<?php	} ?>
							</td>
							<td>
								<div>
			                        <a style="text-decoration: none;" href="edit_department.php?id=<?php echo $id; ?>">EDIT</a> | <a style="text-decoration: none;" href="" data-bs-toggle="modal" data-bs-target="#deleteDepartment<?php echo $id; ?>">DELETE</a>
			                    </div>
							</td>
						</tr>

						<!-- Modal -->

						<div class="modal fade" id="deleteDepartment<?php echo $id; ?>" tabindex="-1" aria-labelledby="departmentModalLabel2" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <div class="modal-header">
						        <h5 class="modal-title" id="departmentModalLabel2">Do you want to Delete <?php echo $name; ?>?</h5>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>

						      <div class="modal-body d-flex justify-content-between">
						      	<a href="delete_department.php?id=<?php echo $id; ?>" class="btn btn-danger">Yes</a>
						        <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
						      </div>

						    </div>
						  </div>
						</div>

						<!-- Modal -->

						</tbody>

			         <?php
			     			}
						?>
					  </tbody>
					
				</div>
</body>
</html>