<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';

// checkt of hij verbinding heeft met database
	if (!$con) {
			echo 'Kan geen connectie maken met de database';
			die();
		}

			if ( isset($_GET['id']) ) {
				$id= $_GET['id'];
				$sql = "UPDATE invoices SET active = 1 WHERE projectNR = '$id' ";


				if (!$query = mysqli_query($con, $sql)) {
					echo 'Kan helaas niet updaten...';
					die();
				} else {
					$sql2 = $con->query("SELECT invoicesNR FROM invoices WHERE projectNR = '$id' LIMIT 1");
					$row2 = mysqli_fetch_assoc($sql2);
					header('location: activate.php?id=' . $row2['projectsNR'] . '');
				}
			}
?>

</body>
</html