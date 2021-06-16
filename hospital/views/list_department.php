<?php include_once('session_user.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Department List</title>
	<?php include_once('css/bootstrap.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
</head>
<body>
	<?php include_once('header.php'); ?>
    <?php include_once('sidebar.php'); ?>

		<section class="col-md-10 pt-5 pb-5">
			<div class="d-flex justify-content-end pb-3">
				<input class="form-control" type="text" style="width: 200px" id="search_input" onkeyup="search(this.value)" placeholder="searching...">&nbsp;&nbsp;
				<span class="btn btn-primary">SEARCH</span>
			</div>
			<div id="result">
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
					  <tbody>
					    <?php

							$i = 0;
							foreach($departments as $department)
							{
								$id      		= $department["id"];
								$name     		= $department["name"];
								$description    = $department["description"];
								$status         = $department['status'];
								$i++;
							?>
							
						<tr>
							<td><?php echo $i ; ?></td>
							<td><?php echo $name ; ?></td>
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
			                        <a style="text-decoration: none;" href="edit_department.php?id=<?php echo $id; ?>">EDIT</a> | <a style="text-decoration: none;" href="" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id; ?>">DELETE</a>
			                    </div>
							</td>
						</tr>

						<!-- Modal -->

						<div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" aria-labelledby="departmentModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">

						      <div class="modal-header">
						        <h5 class="modal-title" id="departmentModalLabel">Do you want to Delete <?php echo $name; ?>?</h5>
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
			         <?php
			     			}
						?>
					  </tbody>
					</table>
					
				</div>
			</div>
			<div id="search_result">
				
			</div>
		</section>

	</main>
	<script>
		function search(str)
		{
			 if (str.length==0)
			 {
			    document.getElementById("search_result").innerHTML="";
			    document.getElementById("result").style.display='block';
			    return;
			  }
			var http = new XMLHttpRequest();
			var search_word=document.getElementById("search_input").value;
			http.onreadystatechange=function()
			{
				if(http.readyState == 4 && http.status == 200)
				{
					document.getElementById("result").style.display='none';
					document.getElementById("search_result").innerHTML=http.responseText;
				}
			}
			http.open("GET","search_department.php?sk="+search_word,true);
		    http.send();
		}
	</script>
	<?php include_once('js/javascript.php'); ?>
</body>
</html>