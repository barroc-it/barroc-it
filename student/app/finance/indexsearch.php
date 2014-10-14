<?php
	require '../../config/config.php';
	include '../templates/header.php';

$search = mysqli_real_escape_string($con, $_GET['search']);

	if ($search) {
	
		$query = "SELECT * FROM customers WHERE companyname LIKE '%" . $search ."%' OR description LIKE '%" . $search ."%'";
		$result = mysqli_query($con, $query);
?>

	<div class="container">
		<h1>Search results:</h1> 
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Companyname</th>
						<th>Omschrijving</th>
						<th>bank account number</th>
						<th>Credit</th>
						<th>Revenue ammount</th>
						<th>Limit</th>
						<th>Reservation number</th>
						<th>BKR</th>
					</tr>
				</thead>
				
				<tbody class="projects">
					<?php 
						while ($row = mysqli_fetch_assoc($result)) {
							echo '<tr>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['companyName'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['description'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['bankNumber'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['credit'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['salesAmount'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['limit'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['largeReservationNumber'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['bkr_control'] . '</a></td>';
							echo '</tr>';
						}
	}
?>
				</tbody>		
			</table>
		<a href="index.php" class="btn btn-primary">Back</a>
	</div>