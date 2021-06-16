<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

			<h4 class="text-center pt-2">A D M I N &nbsp; &nbsp; L I S T</h4>
				<div class="table-responsive">
					<table class="table text-center table-hover">
					  <thead class="table-dark">
					    <tr>
							<th scope="col">#SL</th>
							<th scope="col">Image</th>
					        <th scope="col">First Name</th>
					        <th scope="col">Last Name</th>
					        <th scope="col">Gender</th>
					        <th scope="col">Blood Group</th>
					        <th scope="col">Mobile No</th>
					        <th scope="col">Birth Date</th>
							<th scope="col">Email</th>
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
						$query = "SELECT * FROM users WHERE f_name LIKE '%$key%' or l_name LIKE '%$key%' or email LIKE '%$key%'";

					    $result=mysqli_query($conn,$query);

					    $i = 0;
						while($user = mysqli_fetch_assoc($result))
						{
							if($user['user_type'] == 'admin')
							{
								$id          = $user["id"];
								$img         = $user["picture"];
								$f_name      = $user["f_name"];
								$l_name      = $user["l_name"];
								$gender      = $user["gender"];
								$blood_group = $user["blood_group"];
								$mobile_no   = $user["mobile_no"];
								$birth_date  = $user["birth_date"];
								$email       = $user["email"];
								$address     = $user["address"];
								$status      = $user['status'];						
								$user_type   = $user['user_type'];						
								$i++;
						?>
						<tbody>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php
									if( $img == '../storage/admin_image/')
									{ ?>
										<img style="height: 40px; width: 50px;" src="../storage/default.png">
							<?php	}
									else
									{ ?>
										<img style="height: 40px; width: 50px;" src="<?php echo $img ;?>">
							<?php	}

								  ?>
							</td>
							<td><?php echo $f_name; ?></td>
							<td><?php echo $l_name; ?></td>
							<td><?php echo $gender; ?></td>
							<td><?php echo $blood_group; ?></td>
							<td><?php echo $mobile_no; ?></td>
							<td><?php echo $birth_date ; ?></td>
							<td><?php echo $email ; ?></td>
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
			                        <a style="text-decoration: none;" href="edit_admin.php?id=<?php echo $id; ?>">EDIT</a> | <a style="text-decoration: none;" href="" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id; ?>">DELETE</a>
			                    </div>
							</td>
						</tr>

						<?php
							}
							?>

						<!-- Modal -->

						<div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" aria-labelledby="adminModalLabel2" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <div class="modal-header">
						        <h5 class="modal-title" id="adminModalLabel2">Do you want to Delete <?php echo $f_name.' '.$l_name; ?>?</h5>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>

						      <div class="modal-body d-flex justify-content-between">
						      	<a href="delete_admin.php?id=<?php echo $id; ?>" class="btn btn-danger">Yes</a>
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