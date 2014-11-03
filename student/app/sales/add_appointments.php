<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 

?>	
<?php
if ( isset($_POST['input_appointments']) ) {
	$name     			=mysqli_real_escape_string($con, $_POST['name']);
	$datum				=mysqli_real_escape_string($con, $_POST['datum']);
	$description    	=mysqli_real_escape_string($con, $_POST['description']);
	$customerNR         =mysqli_real_escape_string($con, $_POST['customerNR']);

	$sql = "INSERT INTO appointments (name, datum, description, customerNR)
			VALUES (
					'$name',
					'$datum',
					'$description',
					'$customerNR'			
	)";

	$query = mysqli_query($con, $sql);

	if (!$query) {
		$msg = urlencode(trigger_error('query niet gelukt. geprobeerde query was ' . $sql));
		header('location: appointments.php?msg='.$msg);	
	}
		$msg = urlencode('appointment is succesvol toegevoegd.');
		header ('location: appointments.php?msg='.$msg);
	}
?>

<div class="container">
	<div class="header">
		<h2>Add-appointments</h2>
	</div>
	<br>
	<div class="addAppointments">
		<form method="post" action="" role="form" class="col-md-6">
		    <div class="form-group">
		        <label class="col-md-4" for="name">Naam</label>
		        <input class="col-md-2" type="text" id="name" name="name">
		    </div>
<br>
		    <div class="form-group">
		        <label class="col-md-4"for="datum">date</label>
		        <input class="col-md-2" type="date" id="datum" name="datum">
		    </div>
<br>
		    <div class="form-group">
		        <label class="col-md-4" for="description">Description</label>
		        <input class="col-md-2" type="text" id="description" name="description">
		    </div>
<br>
 			<div class="form-group">
		        <label class="col-md-4" for="customerNR">customerNR</label>
		        <input class="col-md-2" type="int" id="customerNR" name="customerNR">
		    </div>
<br>
		<input type="submit" value="toevoegen" name="input_appointments" class="btn btn-primary col-md-4">
		</form>
	</div>
 </div>