<?php 
	include '../templates/header.php';
	require '../../config/config.php';
?>

<style>
	* {
		margin-top: -12px;
	}
	body {
		min-width: 900px;
	}
</style>

<header>
	<div class="navibar">
		<ul class="navibarbutton">
			<li><a class="menutext" href="index.php">Home</a></li>
			<li><a class="active" href="deactivatedproject.php">Deactivated projects</a></li>		
		</ul>
		<div class="searchitem">
			<form  method="GET" action="indexsearch.php" id="searchform" name="search"> 
			    <input id="search-bar" type="text" class="form-control inputsearch" placeholder="Search..." name="search"> 
			    <input type="submit" class="search-btn"> 
			</form> 
		</div>
		<button class="blue-btn"><a href="logout.php">Log out</a></button>
	</div>
</header>

<?php

	if ( isset($_GET['projectNR']) ) {
		
		$projectNR = $_GET['projectNR'];
		$sql = "SELECT * FROM projects";

		if (!$query = mysqli_query($con, $sql)) {
			echo '<a href="index.php"><button class="blue-btn2" style="font-size: 20px; height: 100px; width: 350px; float: left; margin-top: 10px; margin-left: 35%;">Kan selectie niet uitvoeren,<br>Klik hier om terug te gaan.</button></a>';
			die();
			}
		$row = mysqli_fetch_assoc($query);
		}

?>

<div class="container">
	<h1>Deactivated projects</h1> 
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
				
					$sql = "SELECT * FROM projects WHERE active = 1";

					$query = mysqli_query($con, $sql);


						while ($row = mysqli_fetch_assoc($query)) {
							echo '<tr>';
							echo '<td>' . $row['maintenance_contract'] . '</td>' ;
							echo '<td>' . $row['software'] . '</td>' ;
							echo '<td>' . $row['hardware'] . '</td>' ;
							echo '<td>' . $row['description'] . '</td>' ;
					 		echo '<td><a href="activate.php?projectNR=' . $row['projectNR'] . '">' ?><button class="edit-btn">Activate</button></a></td>
					 	<?php 						
							echo '</tr>';
						} 
					
				?>
			</tbody>
		</table>
	</div>