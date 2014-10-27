<?php 
	include '../templates/header.php';
	require '../../config/config.php';
?>

<style>
	body {
		min-width: 900px;
	}
</style>

<header>

	<div class="navibar">
		<button class="btn btn-primary btn-sm btn-primary2"><a href="logout.php">Log out</a></button>
		<ul class="navibarbutton">
			<li><a class="menutext" href="index.php">Home</a></li>
			<li><a class="menutext" href="deactivatedproject.php">Deactivated projects</a></li>		
		</ul>
		<div class="searchitem">
			<form  method="post" action="projectsearch.php" id="searchform" name="search"> 
			    <input  type="text" class="form-control inputsearch" placeholder="Search..." name="search"> 
			    <input  type="submit" class="search-btn" name="submit" value""> 
			</form> 
		</div>
	</div>
</header>

<?php

	if ( isset($_GET['customerNR']) ) {
		$customerNR = $_GET['customerNR'];
		$sql = "SELECT * FROM customers WHERE customerNR = '$customerNR' ";

		if (!$query = mysqli_query($con, $sql)) {
			echo '<a href="index.php"><button>Kan selectie niet uitvoeren, Klik hier om terug te gaan.</button></a>';
			die();
			}
		$row = mysqli_fetch_assoc($query);
		}

?>

<div class="container">
	<br>
	<br>
	<a class="btn btn-primary col-md-2" href="addProject.php">toevoegen</a>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Maintenance contract</th>
					<th>Software</th>
					<th>Hardware</th>
					<th>Prospect</th>
					<th>Deactivate</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT * FROM projects WHERE active = 0 AND customerNR = '$customerNR' " ;
					$query = mysqli_query($con, $sql);

						while ($row = mysqli_fetch_assoc($query)) {
							echo '<tr>';
							echo '<td>' . $row['maintenance_contract'] . '</td>' ;
							echo '<td>' . $row['software'] . '</td>' ;
							echo '<td>' . $row['hardware'] . '</td>' ;
							echo '<td>' . $row['description'] . '</td>' ;
					 		echo '<td><a href="deactivate.php?projectNR=' . $row['projectNR'] . '">' ?><button class="warning-btn">Deactivate</button></a></td>
					 	<?php 						
							echo '</tr>';
						} 	
				?>
			</tbody>
		</table>
	</div>