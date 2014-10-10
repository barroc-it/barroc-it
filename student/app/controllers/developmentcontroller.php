<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';

// checkt of hij verbinding heeft met database
	if (!$con) {
			echo 'Kan geen connectie maken met de database';
			die();
		}

// klant aanmaken

	// if (isset($_POST['createUser'] ) ) {

	// 	$id = $_GET['customerNR'];
	// 	$sql = "INSERT INTO barrocit (companyName, address, postcode) VALUES ('$companyName', '$address', '$postcode')";

	// 	if( $query = mysqli_query($con, $sql)){
	// 		$msg = "Klant is succesvol toegevoegd";
	// 		header('location: ../development/index.php');
	// 	}else{
	// 		echo "kan de query niet uitvoeren";
	// 	}
	// }

// klant deactiveren

	// $id = $_GET['id'];
	// $sql = "DELETE FROM projectentest WHERE id = '$id'";
	
	// if ( isset($_GET['delete']) ) {
	// 	if ($query = mysqli_query($con, $sql)) {
 // 		header("location: ../index.php");
	// } else {
 // 		echo "foutje met de verwijder query..";
 // 		}
	// }

// klant bewerken

// if ( isset($_GET['customerNR']) ) {
// 	$customerNR = $_GET['customerNR'];
// 	$sql = "SELECT * FROM customers WHERE customerNR = '$customerNR'";

// 	if (!$query = mysqli_query($con, $sql)) {
// 		echo 'Kan selectie niet uitvoeren';
// 		die();
// 		}
// 	$row = mysqli_fetch_assoc($query);
// 	} else {
		
// 	}

// 	if ( isset($_POST['submit']) ) {
// 		$companyName = mysqli_real_escape_string($con, $_POST['companyName']);
// 		$address = mysqli_real_escape_string($con, $_POST['address']);
// 		$postcode = mysqli_real_escape_string($con, $_POST['postcode']);
	
// 		$sql = "UPDATE customers SET companyName = '$companyName', address = '$address', postcode = '$postcode' WHERE customerNR = '$customerNR'";

// 		if (!$query = mysqli_query($con, $sql)) {
// 			echo 'Kan helaas niet updaten...';
// 			die();
// 		} else {
// 			$msg = urlencode('Customer changed!');
// 			header("location: ../development/index.php");
// 		}
// 	}

?>

<!-- <style>
	.editform {
		margin: 0 auto;
		width: 500px;
	}
</style>

<div class="editform">
	<h1>Edit project</h1>
</div>

<form action="" method="POST" class="editform">
	<div class="form-group col-sm-12">
		<label for="companyName">Company name</label>
		<input type="text" value='<?php echo $row['companyName']; ?>' class="form-control" name="companyName" id="customerNR">
	</div>
	<div class="form-group col-sm-12">
		<label for="address">Address</label>
		<input type="text" value='<?php echo $row['address']; ?>' class="form-control" name="address" id="customerNR">
	</div>
	<div class="form-group col-sm-12">
		<label for="postcode">Postcode</label>
		<input type="text" value='<?php echo $row['postcode']; ?>' class="form-control" name="postcode" id="customerNR">
	</div>
	<div class="form-group col-sm-12">
		<input name="submit" type="submit" value="Bewerken" class="btn btn-default btn-lg btn-block">
	</div>
</body>
</html> -->