<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 
?>
<div class="navibar">
		<ul class="navibarbutton">
			<li><a class="active" href="index.php">Home</a></li>		
		</ul>
	<div class="searchform">
		<form method="GET" action="indexsearch.php" name="search"> 
			   <input type="text" class="form-control" placeholder="Search..." name="search">
		</form>
	</div>
		<input type="submit" class="searchbtn">
		<a class="btn btn-info col-md-2 col-md-offset-2 btn-sm" href="logout.php">logout</a>
</div>

<div class="container">
	<div class="page-header">
		<h2 class="col-md-12">Appointments</h2>
	</div>
	
	<div class="customers">

		<?php echo '<a class="btn btn-primary col-md-2" href="add_appointments.php?customerNR=' . $_GET['customerNR'] . '">toevoegen</a>'; ?>
<br>

		<table class="table table-striped">
			<tr>
			<th>Companyname</th>
			<th>Date</th>
			<th>Description</th>
			<th>Edit</th>
			</tr>
		<?php 
				$customerNR = $_GET['customerNR'];
				$sql = "SELECT * FROM appointments WHERE customerNR = $customerNR";
				$query = mysqli_query($con, $sql);

				while ($row = mysqli_fetch_assoc($query)) {
					echo "<tr>";
					echo "<td>" . $row['name'] . "</td>";
					echo '<td>' . $row['datum'] . '</td>';
					echo '<td>' . $row['description'] . '</td>';
					echo '<td> <a href="editappointments.php?appointmentNR=' . $row['appointmentNR'] . '">edit</td>';	
					echo "</tr>";
				}
		?>
		</table>

	</div>

</div>


