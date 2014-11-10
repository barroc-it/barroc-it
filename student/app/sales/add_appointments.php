<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 
	session_start();
if($_SESSION['login'] == 1) {  
} else {
	header("location:../login.php");
}

if ( isset($_POST['input_appointments']) ) {
	$name     			=mysqli_real_escape_string($con, $_POST['name']);
	$datum				=mysqli_real_escape_string($con, $_POST['datum']);
	$description    	=mysqli_real_escape_string($con, $_POST['description']);
	$customerNR         =mysqli_real_escape_string($con, $_GET['customerNR']);

	$sql = "INSERT INTO appointments (name, datum, description, customerNR)
			VALUES ('$name',
					'$datum',
					'$description',
					'$customerNR')";
	$query = mysqli_query($con, $sql);

	if (!$query) {
		$msg = urlencode(trigger_error('query niet gelukt. geprobeerde query was ' . $sql));
		header('location: appointments.php?msg='.$msg);	
	}
	$msg = urlencode('appointment is succesvol toegevoegd.');
	header ('location: appointments.php?customerNR='.$customerNR);
	}
?>

<div class="container">
	<div class="header">
		<h2>Add-appointments</h2>
	</div>
	<div class="addAppointments">
		<form method="post" action="" role="form" class="col-md-8">
		    <div class="form-group col-md-8">
		        <label class="col-md-4" for="name">Company name:</label>
		        <input class="col-md-4" type="text" id="name" name="name">
		    </div>
		    <div class="form-group col-md-8">
		        <label class="col-md-4"for="datum">date:</label>
		        <input class="col-md-4" type="date" id="datum" name="datum">
		    </div>
		    <div class="form-group col-md-8">
		        <label class="col-md-4" for="description">Description:</label>
		        <input class="col-md-4" type="text" id="description" name="description">
		    </div>
		<input type="submit" value="Add" name="input_appointments" class="btn btn-primary col-md-8">
		</form>
	</div>
 </div>