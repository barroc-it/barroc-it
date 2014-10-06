<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';
?>

	<div class="container">
		<h1>Customers</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Customer number</th>
					<th>projects</th>
					<th>Edit</th>
					<th>Deactivate</th>
				</tr>
			</thead>
					
			<tbody class="projects">
				<?php 
					$sql = "SELECT * FROM customers";
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {
						echo '<tr>';
						echo '<td><a href="projecten.php?id=' . $row['customerNR'] . '">' . $row['customerNR'] . '</a></td>';
						echo '<td><a href="projecten.php?id=' . $row['customerNR'] . '">' . $row['companyName'] . '</a></td>';
						
						echo '<td><a href="../controllers/projectcontroller.php?id=' . $row['customerNR'] . '">';
						echo '<span class="glyphicon glyphicon-pencil"></td>';
						
						echo '<td><a href="../controllers/projectcontroller.php?id=' . $row['customerNR'] .  '&delete=true"'; ?> onclick="return confirm('Are you sure you want to deactivate this item?')"><span class="glyphicon glyphicon-remove"></span></a>
					<?php
						echo '</tr>';
						}
					?>
			</tbody>		
		</table>
			<div>
				<button type="button" class="btn btn-default btn-lg">
  					<span class="glyphicon glyphicon"></span><a href="controllers/projectcontroller.php">Add</a>
				</button>
			</div>
	</div>
		
<?php 
	include '../templates/footer.php'; 
	?>