<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';
	session_start();
if($_SESSION['login'] == 3) {  
} else {
header("location:../login.php");
}

// checkt of hij verbinding heeft met database
	if (!$con) {
			echo 'Kan geen connectie maken met de database';
			die();
		}
			if ( isset($_GET['projectNR']) ) {
				$projectNR = $_GET['projectNR'];
				$sql = "UPDATE projects SET active = 1 WHERE projectNR = '$projectNR' ";

				if (!$query = mysqli_query($con, $sql)) {
					echo 'Kan helaas niet updaten...';
					die();
				} else {
					$sql2 = $con->query("SELECT customerNR FROM projects WHERE projectNR = '$projectNR' LIMIT 1");
					$row2 = mysqli_fetch_assoc($sql2);
					header('location: projecten.php?customerNR=' . $row2['customerNR'] . '');
				}
			}
?>

</body>
</html