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
	</div>
			<input type="submit" class="searchbtn">
		</form>
		<a class="btn btn-info col-md-2 col-md-offset-2 btn-sm" href="logout.php">logout</a>
</div>

<div class="container">
	<div class="page-header">
		<h2>Appointments</h2>
	</div>
	<div class="customers">
		<table class="table table-striped">
			<tr>
			<th>Companyname</th>
			<th>Date</th>
			<th>Description</th>
			<th>Edit</th>
			</tr>
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


