<?php

require '../../config/config.php';




if ( isset($_POST['input_appointments']) ) 

{
	$name     	=mysqli_real_escape_string($con, $_POST['name']);
	$datum			=mysqli_real_escape_string($con, $_POST['datum']);
	$description  		=mysqli_real_escape_string($con, $_POST['description']);
	
		

	$sql = "INSERT INTO appointments (name, datum, description)
			VALUES (
					'$name',
					'$datum',
					'$description'
					
					
	)";

	$query = mysqli_query($con, $sql);


	$msg = urlencode('bedrijf <b>' . $name . '</b> is succesvol toegevoegd.');
	header ('location: ../sales/appointments.php?msg='.$msg);
}
	if (!$query) {
		$msg = urlencode(trigger_error('query niet gelukt. geprobeerde query was ' . $sql));
		header('location: ../sales/appointments.php?msg='.$msg);	
	}
