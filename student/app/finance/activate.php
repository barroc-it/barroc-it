<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';	
?>
	
	<div class="container">
		<h1>Finance panel Activate</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Invoice duration</th>
					<th>Quintity</th>
					<th>Description</th>
					<th>Price</th>
					<th>BTW</th>
					<th>Amount</th>
					<th>Edit</th>
					<th>Deactivate</th>
				</tr>
			</thead>
					
			<tbody class="finance">
				<?php 

				if ( isset($_GET['id']) ) {
				$id = $_GET['id'];
				$sql = "SELECT * FROM invoices WHERE projectNR = '$id' ";
				$query = mysqli_query($con, $sql);
				while($row = mysqli_fetch_assoc($query))
				{
						echo '<tr>';
						echo '<td>' . $row['date'] . '</td>';
						echo '<td>' . $row['quintity'] . '</td>';
						echo '<td>' . $row['description'] . '</td>';
						echo '<td>' . $row['price'] . '</td>';
						echo '<td>' . $row['btw'] . '</td>';
						echo '<td>' . $row['amount'] . '</td>';
						echo '<td><a href="activateEdit.php">Edit</a></td>';
						echo '<td><a href="deactivate.php?invoicesNR=' . $row['invoicesNR'] . '">Deactivate</a>';
						echo '</tr>';
				}

	}



/*
	$sql = "SELECT * FROM invoices";
		$query = mysqli_query($con, $sql);
					{
						echo '<tr>';
						echo '<td>' . $row['datum'] . '</td>';
						echo '<td>' . $row['hoeveelheid'] . '</td>';
						echo '<td>' . $row['description'] . '</td>';
						echo '<td>' . $row['bedrag'] . '</td>';
						echo '<td>' . $row['btw'] . '</td>';
						echo '<td>' . $row['amount'] . '</td>';
						echo '<td><a href="activateEdit.php">Edit</a></td>';
						echo '<td><a href="deactivefinance.php?invoicesNR=' . $row['projectsNR'] .  '&delete=true">Deactivate</a>';
					
						echo '</tr>';
						}*/
					?>
</tbody>
</table>

	<a href="index.php" class="btn btn-primary">Back</a>
	</body>
	</html>