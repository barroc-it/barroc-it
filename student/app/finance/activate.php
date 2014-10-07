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
					$sql = "SELECT * FROM invoices" ;
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {
						echo '<tr>';
						echo '<td>' . $row['datum'] . '</td>';
						echo '<td>' . $row['hoeveelheid'] . '</td>';
						echo '<td>' . $row['description'] . '</td>';
						echo '<td>' . $row['bedrag'] . '</td>';
						echo '<td>' . $row['btw'] . '</td>';
						echo '<td>' . $row['amount'] . '</td>';
					
						echo '</tr>';
						}
					?>

<?php 
	include '../templates/footer.php'; 
	?>
	<a href="index.php">Back</a>