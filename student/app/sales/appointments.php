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
			<th>Companyname</th>
			<th>Date</th>
			<th>Description</th>
			<th>Edit</th>
		</tr>
			<a class="btn btn-primary col-md-2" href="add_appointments.php">toevoegen</a>
			<?php 
			$sql = "SELECT * FROM appointments";
			$query = mysqli_query($con, $sql);

			while ($row = mysqli_fetch_assoc($query)) {
				echo "<tr>";
					echo "<td>" . $row['name'] . "</td>";
					echo '<td>' . $row['datum'] . '</td>';
					echo '<td>' . $row['description'] . '</td>';
					echo '<td> <a href="editappointments.php?appointmentsNR=' . $row['appointmentsNR'] . '">edit</td>';
					
				echo "</tr>";
			}
		?>




	</div>
</div>


