<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';


	if(isset($_GET['id'])){

		$id = $_GET['id'];
	$sql = "SELECT * FROM invoices WHERE `invoicesNR = $id";
	$query = mysqli_query($con, $sql);


	}
?>
	
<?php 


	if (!$con) {
			echo 'Kan geen connectie maken met de database';
			die();
		}

			if ( isset($_GET['invoicesNR']) ) {
				$projectsNR = $_GET['invoicesNR'];
				$sql = "UPDATE invoices SET actief = 0 WHERE invoicesNR= '$invoicesNR'";

				if (!$query = mysqli_query($con, $sql)) {
					echo 'Kan helaas niet updaten...';
					die();
				} else {
					$msg = urlencode('Invoices changed!');
					header('location: deactivefinance.php?invoicesNR=' . $row['invoicesNR'] . '');
				}
			}
?>

</body>
</html>