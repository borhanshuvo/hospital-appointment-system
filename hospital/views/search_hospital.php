<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

			<h4 class="text-center pt-2">H O S P I T A L &nbsp; &nbsp; L I S T</h4>
				<div class="table-responsive">
					<table class="table text-center table-hover">
					  <thead class="table-dark">
					    <tr>
							<th scope="col">#SL</th>
					        <th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Phone No</th>
							<th scope="col">Address</th>					
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
						$query = "SELECT * FROM add_hospital WHERE name LIKE '%$key%'";

					    $result=mysqli_query($conn,$query);

					    $i = 0;
						while($hospital = mysqli_fetch_assoc($result))
						{
							$id      		= $hospital["id"];
							$name     		= $hospital["name"];
							$description    = $hospital["description"];
							$email   		= $hospital["email"];
							$address 		= $hospital["address"];
							$phone_no  		= $hospital["phone_no"];
							$status         = $hospital['status'];
							$i++;
						?>
						<tbody>
						<tr>
							<td><?php echo $i ; ?></td>
							<td><?php echo $name ; ?></td>
							<td><?php echo $email ; ?></td>
							<td><?php echo $phone_no ; ?></td>
							<td><?php echo $address ; ?></td>
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
			                        <a style="text-decoration: none;" href="edit_hospital.php?id=<?php echo $id; ?>">EDIT</a> | <a style="text-decoration: none;" href="" data-bs-toggle="modal" data-bs-target="#deleteHospital<?php echo $id; ?>">DELETE</a>
			                    </div>
							</td>
						</tr>

						<!-- Modal -->

						<div class="modal fade" id="deleteHospital<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Do you want to Delete <?php echo $name; ?>?</h5>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>

						      <div class="modal-body d-flex justify-content-between">
						      	<a href="delete_hospital.php?id=<?php echo $id; ?>" class="btn btn-danger">Yes</a>
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