<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';
?>

	<div class="container">
		<h1>Projecten</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Klant</th>
					<th>Aantal projecten</th>
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
						echo '<td><a href="projecten.php?id=' . $row['id'] . '">' . $row['klant'] . '</td>';
						echo '<td>' . $row['project'] . '</td>';
						
						echo '<td><a href="../controllers/projectcontroller.php?id=' . $row['id'] . '">';
						echo '<span class="glyphicon glyphicon-pencil"></td>';
						
						echo '<td><a href="../controllers/projectcontroller.php?id=' . $row['id'] .  '&delete=true"'; ?> onclick="return confirm('Are you sure you want to deactivate this item?')"><span class="glyphicon glyphicon-remove"></span></a>
					<?php
						echo '</tr>';
						}
					?>
	</div>
				<div>
						<button type="button" class="btn btn-default btn-lg">
  							<span class="glyphicon glyphicon"></span><a href="controllers/projectcontroller.php">Toevoegen</a>
						</button>
				</div>
			</tbody>		
		</table>
	</div>
		
<?php 
	include '../templates/footer.php'; 
	?>