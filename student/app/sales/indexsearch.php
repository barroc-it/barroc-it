<?php
	require '../../config/config.php';
	include '../templates/header.php';

$search = mysqli_real_escape_string($con, $_GET['search']);

	if ($search) {
	
		$query = "SELECT * FROM customers WHERE companyname LIKE '%" . $search ."%' ";
		$result = mysqli_query($con, $query);
?>

	<div class="container">
		<h1>Search results:</h1> 
			<table class="table table-striped">
				<thead>
					<tr>
						<th>companyName</th>
						<th>address</th>
						<th>postcode</th>
						<th>residence</th>
						<th>telephonenumber</th>
						<th>email</th>
					</tr>
				</thead>
				
				<tbody class="projects">
					<?php 
						while ($row = mysqli_fetch_assoc($result)) {
							echo '<tr>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['companyName'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['address'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['postcode'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['residence'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['telephoneNumber'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['email'] . '</a></td>';
							echo '</tr>';
						}
	}
?>
				</tbody>		
			</table>
		<a href="index.php" class="btn btn-primary">Back</a>
	</div>