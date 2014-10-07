<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';
?>


<div class="container">
		<h1>Finance</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Companyname</th>
					<th>bank account number</th>
					<th>Credit</th>
					<th>Revenue ammount</th>
					<th>Limit</th>
					<th>Ledger account</th>
					<th>BKR</th>
				</tr>
			</thead>
					
			<tbody class="finance">
				<?php 
					$sql = "SELECT * FROM customers" ;
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {
						echo '<tr>';
						echo '<td>' . $row['companyName'] . '</td>';
						echo '<td>' . $row['banknumber'] . '</td>';
						echo '<td>' . $row['krediet'] . '</td>';
						echo '<td>' . $row['omzetbedrag'] . '</td>';
						echo '<td>' . $row['limiet'] . '</td>';
						echo '<td>' . $row['grootboekingsnummer'] . '</td>';
						echo '<td>' . $row['bkr_controle'] . '</td>';
						echo '</tr>';
						}
					?>
	
<?php 
	include '../templates/footer.php'; 
	?>
		<a href="index.php">Back</a>