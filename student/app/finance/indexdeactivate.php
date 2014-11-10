<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';
	session_start();
if($_SESSION['login'] == 2) {  

} else {
header("location:../login.php");
}

// checkt of hij verbinding heeft met database
	if (!$con) {
			echo 'Kan geen connectie maken met de database';
			die();
		}

			if ( isset($_GET['customerNR']) ) {
				$customerNR = $_GET['customerNR'];
				$sql = "UPDATE invoices SET active = 1 WHERE customerNR = '$customerNR' ";

				if (!$query = mysqli_query($con, $sql)) {
					echo 'Kan helaas niet updaten...';
					die();
				} else {
	
					header('location: index.php' );
				}
			}
?>

</body>
</html