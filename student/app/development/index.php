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
						printf('<td>%s</td>', $row['opdrachtgever']);
						printf('<td>%s</td>', $row['project']);
						printf('<td><a href="editUser.php?id=%s"><span class="glyphicon glyphicon-pencil"></td>', $row['id']);
						echo '<td>'; ?> <a href="deleteUser.php?id=%s" onclick="return confirm('Are you sure you want to delete this item?');">
						<span class="glyphicon glyphicon-remove"></a>
						<?php 
						echo '</td>';
						echo '</tr>';
						}

				?>
				<div>
					<!-- <tr>
						<td class="projectinfo">
							<?php
								// $sql = "SELECT * FROM projectentest";
								// $query = mysqli_query($con, $sql);

								// while ($row = mysqli_fetch_assoc($query)) {
								// 	echo '<td>' . $row['adress'] . '</td>' ;
								// 	echo '<td>' . $row['postcode'] . '</td>' ;
								// 	echo '<td>' . $row['telefoonnummer'] . '</td>' ;
								// }
							?>
						</td> -->
					</tr>
				</div>
			</tbody>		
		</table>
		<button type="button" class="btn btn-default btn-lg">
  			<span class="glyphicon glyphicon"></span><a href="createUser.php">Toevoegen</a>
		</button>
	</div>


</body>
</html>