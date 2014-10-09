<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';

// checkt of hij verbinding heeft met database
	if (!$con)
		{
			echo 'Kan geen connectie maken met de database';
			die();
		}

// klant aanmaken

	if (isset($_POST['createUser'] ) ) {

		$id = $_GET['customerNR'];
		$sql = "INSERT INTO barrocit (companyName, address, postcode) VALUES ('$companyName', '$address', '$postcode')";

		if( $query = mysqli_query($con, $sql)){
			$msg = "Klant is succesvol toegevoegd";
			header('location: ../development/index.php');
		}else{
			echo "kan de query niet uitvoeren";
		}
	}

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

// if ( isset($_GET['id']) ) {
// 	$id = $_GET['customerNR'];
// 	$sql = "SELECT * FROM barrocit WHERE customerNR = '$customerNR'";

// 	if (!$query = mysqli_query($con, $sql)) {
// 		echo 'Kan selectie niet uitvoeren';
// 		die();
// 		}
// 	$row = mysqli_fetch_assoc($query);
// 	} else {
// 		header('location: ../development/index.php');
// 	}

// 	if ( isset($_POST['submit']) ) {
// 		$opdrachtgever = mysqli_real_escape_string($con, $_POST['opdrachtgever']);
// 		$project = mysqli_real_escape_string($con, $_POST['project']);
// 		$postcode = mysqli_real_escape_string($con, $_POST['postcode']);
// 		$telefoonnummer = mysqli_real_escape_string($con, $_POST['telefoonnummer']);
	
// 		$sql = "UPDATE barrocit SET opdrachtgever = '$opdrachtgever', project = '$project', postcode = '$postcode', telefoonnummer = '$telefoonnummer' WHERE customerNR = '$customerNR'";

// 		if (!$query = mysqli_query($con, $sql)) {
// 			echo 'Kan helaas niet updaten...';
// 			die();
// 		}
// 		$msg = urlencode('Project changed!');
// 		header('location: ../index.php?msg=' . $msg );
// 	}

?>

<style>
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
		<input type="text" value='<?php echo $row['companyName']; ?>' class="form-control" name="companyName" id="companyName">
	</div>
	<div class="form-group col-sm-12">
		<label for="address">Address</label>
		<input type="text" value='<?php echo $row['address']; ?>' class="form-control" name="address" id="address">
	</div>
	<div class="form-group col-sm-12">
		<label for="postcode">Postcode</label>
		<input type="text" value='<?php echo $row['postcode']; ?>' class="form-control" name="postcode" id="postcode">
	</div>
	<div class="form-group col-sm-12">
		<input name="submit" type="submit" value="Bewerken" class="btn btn-default btn-lg btn-block">
	</div>

<?php include '../templates/footer.php'; ?>