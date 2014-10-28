
<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';
?>
<?php

if ( isset($_GET['appointmentsNR']) ) {
	$appointmentsNR = $_GET['appointmentsNR'];
	$sql = "SELECT * FROM appointments WHERE appointmentsNR = '$appointmentsNR'";

	if (!$query = mysqli_query($con, $sql)) {
		echo 'Kan selectie niet uitvoeren';
		die();
		}
	$row = mysqli_fetch_assoc($query);
	} else {
		header('location: index.php');
	}

	if ( isset($_POST['submit']) ) {
		$name = mysqli_real_escape_string($con, $_POST['name']);
		$datum = mysqli_real_escape_string($con, $_POST['datum']);
		$description = mysqli_real_escape_string($con, $_POST['description']);
		$sql = "UPDATE appointments SET name = '$name', datum = '$datum', description = '$description' WHERE appointmentsNR = '$appointmentsNR'";

		if (!$query = mysqli_query($con, $sql)) {
			echo 'Kan helaas niet updaten...';
			die();
		}
		$msg = urlencode('Appointments changed!');
		header('location: appointments.php?msg=' . $msg );
	}

?>

<style>
	.editform {
		margin: 0 auto;
		width: 500px;
	}
</style>

<div class="editform">
	<h1>Edit Appointments</h1>
</div>

<form action="" method="POST" class="editform">
	<div class="form-group col-sm-12">
		<label for="name">Bedrijfsnaam</label>
		<input type="text" value='<?php echo $row['name']; ?>' class="form-control" name="name" appointmentsNR="companyName">
	</div>
	<div class="form-group col-sm-12">
		<label for="datum">Datum</label>
		<input type="text" value='<?php echo $row['datum']; ?>' class="form-control" name="datum" appointmentsNR="banknumber">
	</div>
	<div class="form-group col-sm-12">
		<label for="description">Description</label>
		<input type="text" value='<?php echo $row['description']; ?>' class="form-control" name="description" appointmentsNR="description">
	</div>

	<div class="form-group col-sm-12">
		<input name="submit" type="submit" value="Bewerken" class="btn btn-default btn-lg btn-block">
	</div>