<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';

// checkt of hij verbinding heeft met database
	if (!$con) {
			echo 'Kan geen connectie maken met de database';
			die();
		}

			if ( isset($_GET['projectsNR']) ) {
				$projectsNR = $_GET['projectsNR'];
				$sql = "UPDATE projects SET actief = 1 WHERE projectsNR = '$projectsNR' ";


				if (!$query = mysqli_query($con, $sql)) {
					echo 'Kan helaas niet updaten...';
					die();
				} else {
					$sql2 = $con->query("SELECT customerNR FROM projects WHERE projectsNR = '$projectsNR' LIMIT 1");
					$row2 = mysqli_fetch_assoc($sql2);
					header('location: projecten.php?customerNR=' . $row2['customerNR'] . '');
				}
			}
?>

</body>
</html>