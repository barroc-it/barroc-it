<?php
	require '../../config/config.php';
	include '../templates/header.php';
	session_start();
if($_SESSION['login'] == 3) {  
} else {
header("location:../login.php");
}

$search = mysqli_real_escape_string($con, $_GET['search']);

	if ($search) {
	
		$query = "SELECT * FROM customers WHERE companyname LIKE '%" . $search ."%' OR contactPerson LIKE '%" . $search ."%'";
		$result = mysqli_query($con, $query);
?>

	<div class="container">
		<h1>Search results:</h1> 
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Company name</th>
						<th>Contact person</th>
						<th>Open projects</th>
						<th>Last contact date</th>
						<th>Balance</th>
						<th>Limit</th>
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
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['balance'] . '</a></td>';
							echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['maxAmount'] . '</a></td>';
							echo '</tr>';
						}
	}
?>
				</tbody>		
			</table>
		<a href="index.php" class="btn btn-primary">Back</a>
	</div>