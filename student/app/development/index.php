<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';
?>

	<div class="container">
		<h1>Projecten</h1>
		<button type="button" class="btn btn-default btn-lg">
  			<span class="glyphicon glyphicon-plus"></span><a href="create_test.php">Toevoegen</a>
		</button>
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
						printf('<td><a href="editUser.php?id=%s"><span class="glyphicon glyphicon-pencil">', $row['id']);
						printf('<td><a href="deleteUser.php?id=%s"><span class="glyphicon glyphicon-remove">', $row['id']);
						echo '</tr>';
						echo '<tr>';
						printf('<td>%s</td>', $row['opdrachtgever']);
						printf('<td>%s</td>', $row['project']);
						printf('<td><a href="editUser.php?id=%s"><span class="glyphicon glyphicon-pencil">', $row['id']);
						printf('<td><a href="deleteUser.php?id=%s"><span class="glyphicon glyphicon-remove">', $row['id']);
						echo '</tr>';
						echo '<tr>';
						printf('<td>%s</td>', $row['opdrachtgever']);
						printf('<td>%s</td>', $row['project']);
						printf('<td><a href="editUser.php?id=%s"><span class="glyphicon glyphicon-pencil">', $row['id']);
						printf('<td><a href="deleteUser.php?id=%s"><span class="glyphicon glyphicon-remove">', $row['id']);
						echo '</tr>';
						echo '<tr>';
						printf('<td>%s</td>', $row['opdrachtgever']);
						printf('<td>%s</td>', $row['project']);
						printf('<td><a href="editUser.php?id=%s"><span class="glyphicon glyphicon-pencil">', $row['id']);
						printf('<td><a href="deleteUser.php?id=%s"><span class="glyphicon glyphicon-remove">', $row['id']);
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
	</div>

</body>
</html>