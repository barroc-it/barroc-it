<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';

// checkt of hij verbinding heeft met database
	if (!$con) {
			echo 'Kan geen connectie maken met de database';
			die();
		}

			if ( isset($_GET['invoicesNR']) ) {
				$invoicesNR = $_GET['invoicesNR'];
				$sql = "UPDATE invoices SET active = 1 WHERE invoicesNR = '$invoicesNR' ";


				if (!$query = mysqli_query($con, $sql)) {
					echo 'Kan helaas niet updaten...';
					die();
				} else {
					$sql2 = $_GET['invoicesNR'];
					$row2 = mysqli_fetch_assoc($sql2);
					header('location: activate.php?id=' . $row2['id'] );
				}
			}
?>

</body>
</html