<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';

// checkt of hij verbinding heeft met database
	if (!$con) {
			echo 'Kan geen connectie maken met de database';
			die();
		}

			if ( isset($_GET['id']) ) {
				$id = $_GET['id'];
				$sql = "UPDATE invoices SET active = 0 WHERE projectNR = '$id'";

				if (!$query = mysqli_query($con, $sql)) {
					echo 'Kan helaas niet updaten...';
					die();
				} else {
					header('location: activate.php');
				}
			}
?>

</body>
</html>