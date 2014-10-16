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
						<th>customerNummer</th>
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
							echo '<td>' . $row['customerNR'] . '</a></td>';
							echo '<td>' . $row['companyName'] . '</a></td>';
							echo '<td>' . $row['address'] . '</a></td>';
							echo '<td>' . $row['postcode'] . '</a></td>';
							echo '<td>' . $row['residence'] . '</a></td>';
							echo '<td>' . $row['telephoneNumber'] . '</a></td>';
							echo '<td>' . $row['email'] . '</a></td>';
							echo '</tr>';
						}
	}
?>
				</tbody>		
			</table>
		<a href="index.php" class="btn btn-primary">Back</a>
	</div>