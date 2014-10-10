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
			<li><a class="menutext" href="deactivatedproject.php">Deactivated projects</a></li>		
		</ul>
		<div class="searchitem">
			<form  method="post" action="search.php?go" id="searchform" name="search"> 
			    <input  type="text" class="form-control inputsearch" value="Search..." name="search"> 
			    <input  type="submit" class="search-btn" name="submit" value""> 
			</form> 
		</div>
		<a href=""><button class="blue-btn">ADD</button></a>
	</div>
</header>

<?php

	if ( isset($_GET['projectsNR']) ) {
		
		$projectsNR = $_GET['projectsNR'];
		$sql = "SELECT * FROM projects";

		if (!$query = mysqli_query($con, $sql)) {
			echo '<a href="index.php"><button class="blue-btn2" style="font-size: 20px; height: 100px; width: 350px; float: left; margin-top: 10px; margin-left: 35%;">Kan selectie niet uitvoeren,<br>Klik hier om terug te gaan.</button></a>';
			die();
			}
		$row = mysqli_fetch_assoc($query);
		}

?>

<div class="container">
	<h1>Projects</h1> 
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
				
					$sql = "SELECT * FROM projects WHERE actief = 0";

					$query = mysqli_query($con, $sql);


						while ($row = mysqli_fetch_assoc($query)) {
							echo '<tr>';
							echo '<td>' . $row['maintenance_contract'] . '</td>' ;
							echo '<td>' . $row['software'] . '</td>' ;
							echo '<td>' . $row['hardware'] . '</td>' ;
							echo '<td>' . $row['description'] . '</td>' ;
					 		echo '<td><a href="deactivate.php?projectsNR=' . $row['projectsNR'] . '">' ?><button class="warning-btn">Deactivate</button></a></td>
					 	<?php 						
							echo '</tr>';
						} 
					
				?>
			</tbody>
		</table>
	</div>