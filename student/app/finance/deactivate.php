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
					header('location: index.php?invoicesNR=' . $row['invoicesNR'] . '');
				}
			}
?>

</body>
</html>

<?php
// 			if ( isset($_GET['projectNR']) ) {
// 				$projectNR = $_GET['projectNR'];
// 				$sql = "UPDATE projects SET active = 1 WHERE projectNR = '$projectNR' ";


				// if (!$query = mysqli_query($con, $sql)) {
				// 	echo 'Kan helaas niet updaten...';
				// 	die();
				// } else {
				// 	$sql2 = $con->query("SELECT customerNR FROM projects WHERE projectNR = '$projectNR' LIMIT 1");
				// 	$row2 = mysqli_fetch_assoc($sql2);
				// 	header('location: projecten.php?customerNR=' . $row2['customerNR'] . '');
				// }
// 			}
?>