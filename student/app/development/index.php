<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';
?>
	
	<div class="container">
		<h1>Projecten</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Opdrachtgever</th>
					<th>Project</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
					
			<tbody class="projects">
				<?php 
					$sql = "SELECT * FROM projectentest";
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {
						echo '<tr>';
						echo '<td>' . $row['opdrachtgever'] . '</td>';
						echo '<td>' . $row['project'] . '</td>';
						
						echo '<td><a href="../controllers/projectcontroller.php?id=' . $row['id'] . '">';
						echo '<span class="glyphicon glyphicon-pencil"></td>';
						
						echo '<td><a href="../controllers/projectcontroller.php?id=' . $row['id'] .  '&delete=true"'; ?> onclick="return confirm('Are you sure you want to delete this item?')"><span class="glyphicon glyphicon-remove"></span></a>
					<?php
						echo '</tr>';
						}
					?>
	</div>
				<div>
					<table class="projectinfo">
						<!-- <tr>
							<td>adress:</td>
							<td>postcode:</td>
							<td>opdrachtgever:</td>
							<td>telefoonnummer:</td>
						</tr> -->
						<tr>
							<?php
								// $sql = "SELECT * FROM projectentest";
								// $query = mysqli_query($con, $sql);

								// while ($row = mysqli_fetch_assoc($query)) {
								// 	echo '<td>' . $row['adress'] . '</td>' ;
								// 	echo '<td>' . $row['postcode'] . '</td>' ;
								// 	echo '<td>' . $row['opdrachtgever'] . '</td>' ;
								// 	echo '<td>' . $row['telefoonnummer'] . '</td>' ;
								// }
							?>
						</tr>
					</table>
				</div>
			</tbody>		
		</table>
		<!-- <button type="button" class="btn btn-default btn-lg">
  			<span class="glyphicon glyphicon"></span><a href="createUser.php">Toevoegen</a>
		</button> -->
	</div>
<?php 
	include '../templates/footer.php'; 
	?>