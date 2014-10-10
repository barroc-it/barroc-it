<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 
?>
<div class="container">
	<div class="page-header">
		<h2>Appointments</h2>
		
	</div>
	<div class="customers">
		<table class="table table-striped">


			<br>
			<br>
		<tr>
			<th>Bedrijfsnaam</th>
			<th>Datum</th>
			<th>Beschrijving</th>
			<th>Edit</th>
		</tr>
			<?php 
			$sql = "SELECT * FROM appointments";
			$query = mysqli_query($con, $sql);

			while ($row = mysqli_fetch_assoc($query)) {
				echo "<tr>";
					echo "<td>" . $row['name'] . "</td>";
					echo '<td>' . $row['datum'] . '</td>';
					echo '<td>' . $row['beschrijving'] . '</td>';
					echo '<td> <a href="editappointments.php?appointmentsNR=' . $row['appointmentsNR'] . '">edit</td>';
					
				echo "</tr>";
			}
		?>




	</div>
</div>

<?php include '../templates/footer.php'; ?>
