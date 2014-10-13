<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';

// checkt of hij verbinding heeft met database
	if (!$con) {
			echo 'Kan geen connectie maken met de database';
			die();
		}

			if ( isset($_GET['projectNR']) ) {
				$projectNR = $_GET['projectNR'];
				$sql = "UPDATE projects SET active = 0 WHERE projectNR = '$projectNR'";

				if (!$query = mysqli_query($con, $sql)) {
					echo 'Kan helaas niet updaten...';
					die();
				} else {
					header('location: deactivatedproject.php');
				}
			}
?>

</body>
</html>