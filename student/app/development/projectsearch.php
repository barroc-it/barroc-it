<?php
	require '../../config/config.php';
	include '../templates/header.php';

$search = mysqli_real_escape_string($con, $_GET['search']);

	if ($search) {
		$query = "SELECT * FROM customers WHERE contactPerson LIKE '%" . $search ."%' ";
		$result = mysqli_query($con, $query);
?>

	<div class="container">
		<h1>Search results:</h1> 
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Maintenance contract</th>
						<th>Software</th>
						<th>Hardware</th>
						<th>Prospect</th>
						<th>Deactivate</th>
					</tr>
				</thead>
				
				<tbody class="projects">
					<?php 
						while ($row = mysqli_fetch_assoc($result)) {
							echo '<tr>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['companyName'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['contactPerson'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['openProjects'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['lastcontactDate'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['saldo'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['limiet'] . '</a></td>';
							echo '</tr>';
						}
	}
?>
				</tbody>		
			</table>
		<a href="projecten.php" class="btn btn-primary">Back</a>
	</div>