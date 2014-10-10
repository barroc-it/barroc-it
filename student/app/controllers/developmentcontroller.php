<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';

// checkt of hij verbinding heeft met database
	if (!$con) {
			echo 'Kan geen connectie maken met de database';
			die();
		}

		// if ( isset($_GET['projectsNR']) ) {
		// 	$projectsNR = $_GET['projectsNR'];
		// 	$sql = "SELECT * FROM projects WHERE projectsNR = '$projectsNR'";

		// 	if (!$query = mysqli_query($con, $sql)) {
		// 		echo 'Kan selectie niet uitvoeren';
		// 		die();
		// 		}
		// 	$row = mysqli_fetch_assoc($query);
		// 	} else {
		// 		header('location: ../development/projecten.php?customerNR=' . $row['customerNR'] . '');
		// 	}

			if ( isset($_GET['projectsNR']) ) {
				$sql = "UPDATE projects SET actief = 1";

				if (!$query = mysqli_query($con, $sql)) {
					echo 'Kan helaas niet updaten...';
					die();
				} else {
					$msg = urlencode('Project changed!');
					header('location: ../development/projecten.php?customerNR=' . $row['customerNR'] . '');
				}
			}
?>

</body>
</html>