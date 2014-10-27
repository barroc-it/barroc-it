<?php

require '../../config/config.php';

if ( isset($_POST['createUser']) ) 
{
	$name     =mysqli_real_escape_string($con, $_POST['name']);
	$datum =mysqli_real_escape_string($con, $_POST['datum']);
	$description   =mysqli_real_escape_string($con, $_POST['description']);





	
	$sql = "INSERT INTO appointments (name, datum, description)
			VALUES (
					'$name',
					'$datum',
					'$description'
					
				)";

	$query = mysqli_query($con, $sql);

	if (!$query) {
		$msg = urlencode(trigger_error('query niet gelukt. geprobeerde query was ' . $sql));
		header('location: ../add_appointments.php?msg='.$msg);	
	}

	$msg = urlencode('Gebruiker <b>' . $username . '</b> is succesvol toegevoegd.');
	header ('location: ../add_appointments.php?msg='.$msg);
}

