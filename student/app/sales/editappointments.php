
<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';
	session_start();
if($_SESSION['login'] == 1) {  
} else {
	header("location:../login.php");
}
?>
<?php

if ( isset($_GET['appointmentNR']) ) {
	$appointmentNR = $_GET['appointmentNR'];
	$sql = "SELECT * FROM appointments WHERE appointmentNR = '$appointmentNR'";

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
		$sql = "UPDATE appointments SET name = '$name', datum = '$datum', description = '$description' WHERE appointmentNR = '$appointmentNR'";

		if (!$query = mysqli_query($con, $sql)) {
			echo 'Kan helaas niet updaten...';
			die();
		}
		$msg = urlencode('Appointments changed!');
		header('location: index.php?msg=' . $msg );
	}
?>

<div class="editform">
	<h1>Edit Appointments</h1>
</div>

<form action="" method="POST" class="editform">
	<div class="form-group col-sm-12">
		<label for="name">Companyname</label>
		<input type="text" value='<?php echo $row['name']; ?>' class="form-control" name="name" appointmentNR="companyName">
	</div>
	<div class="form-group col-sm-12">
		<label for="datum">Date</label>
		<input type="text" value='<?php echo $row['datum']; ?>' class="form-control" name="datum" appointmentNR="banknumber">
	</div>
	<div class="form-group col-sm-12">

		<label for="description">Description</label>

		<input type="text" value='<?php echo $row['description']; ?>' class="form-control" name="description" appointmentNR="description">
	</div>

	<div class="form-group col-sm-12">
		<input name="submit" type="submit" value="Edit" class="btn btn-primary btn-lg btn-block">
	</div>
</form>
</body>
</html>
