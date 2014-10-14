<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';

// checkt of hij verbinding heeft met database
	if (!$con) {
			echo 'Kan geen connectie maken met de database';
			die();
		}

<<<<<<< HEAD
			if ( isset($_GET['id']) ) {
				$id= $_GET['id'];
				$sql = "UPDATE invoices SET active = 1 WHERE projectNR = '$id' ";

=======
			if ( isset($_GET['invoicesNR']) ) {
				$invoicesNR = $_GET['invoicesNR'];
				$sql = "UPDATE invoices SET active = 1 WHERE invoicesNR = '$invoicesNR' ";
>>>>>>> origin/master

				if (!$query = mysqli_query($con, $sql)) {
					echo 'Kan helaas niet updaten...';
					die();
				} else {
<<<<<<< HEAD
					$sql2 = $con->query("SELECT invoicesNR FROM invoices WHERE projectNR = '$id' LIMIT 1");
					$row2 = mysqli_fetch_assoc($sql2);
					header('location: activate.php?id=' . $row2['projectsNR'] . '');
=======
					header('location: index.php?invoicesNR=' . $row['invoicesNR'] . '');
>>>>>>> origin/master
				}
			}
?>

</body>
<<<<<<< HEAD
</html
=======
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
>>>>>>> origin/master
