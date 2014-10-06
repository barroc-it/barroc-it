<?php

	include '../templates/header.php'; 
	require '../../config/config.php';

	if ( isset($_GET['id']) ) {
		
		$id = $_GET['id'];
		$sql = "SELECT * FROM projects WHERE id = '$id'";

		if (!$query = mysqli_query($con, $sql)) {
			echo 'Kan selectie niet uitvoeren';
			die();
			}
		$row = mysqli_fetch_assoc($query);
		} else {
			header('location: index.php');
		}

?>

<div class="container">
	<h1>Projecten</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Company name</th>
					<th>Address</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {
						echo '<tr>';
						echo '<td>' . $row['projectsNR'] . '</td>' ;
						echo '<td>' . $row['custumerNR'] . '</td>' ;
						echo '<td>' . $row['maintenance contract'] . '</td>' ;
						echo '<td>' . $row['software'] . '</td>' ;
						echo '<td>' . $row['hardware'] . '</td>' ;
						echo '<td>' . $row['prostpect'] . '</td>' ;						
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>