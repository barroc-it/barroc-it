<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';

// checkt of hij verbinding heeft met database
	if (!$con) {
			echo 'Kan geen connectie maken met de database';
			die();
		}

			if ( isset($_GET['projectsNR']) ) {
				$sql = "UPDATE projects SET actief = 1";

				if (!$query = mysqli_query($con, $sql)) {
					echo 'Kan helaas niet updaten...';
					die();
				} else {
					$msg = urlencode('Project changed!');
					header('location: ../development/projecten.php?projectsNR=' . $row['projectsNR'] . '');
				}
			}
?>

</body>
</html>