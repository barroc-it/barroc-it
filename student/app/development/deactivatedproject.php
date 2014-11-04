<?php 
	include '../templates/header.php';
	require '../../config/config.php';
?>

<header>
	<div class="navibar">
		<ul>
			<li><a class="active" href="index.php">Home</a></li>
			<li><a class="menutext" href="deactivatedproject.php">Deactivated projects</a></li>		
		</ul>
		<div class="searchform">
			<form method="GET" action="indexsearch.php" name="search"> 
			    <input type="text" class="form-control" placeholder="Search..." name="search">    
		</div>
				<input type="submit" class="searchbtn">
			</form>
		<a class="btn btn-info col-md-2 col-md-offset-2 btn-sm" href="logout.php">logout</a>
	</div>
</header>

<?php
	if ( isset($_GET['projectNR']) ) {
		$projectNR = $_GET['projectNR'];
		$sql = "SELECT * FROM projects";

		if (!$query = mysqli_query($con, $sql)) {
			echo '<a href="index.php">Kan selectie niet uitvoeren, Klik hier om terug te gaan.</a>';
			die();
			}
		$row = mysqli_fetch_assoc($query);
		}
?>

<div class="container">
	<div class="page-header">
		<h2>Development Deactivated Projects</h2>
	</div> 
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