<?php

require '../../config/config.php';

if ( isset($_POST['createUser']) ) 
{
	$voornaam      =mysqli_real_escape_string($con, $_POST['voornaam']);
	$tussenvoegsel =mysqli_real_escape_string($con, $_POST['tussenvoegsel']);
	$achternaam    =mysqli_real_escape_string($con, $_POST['achternaam']);
	$username      =mysqli_real_escape_string($con, $_POST['username']);
	$email         =mysqli_real_escape_string($con, $_POST['email']);
	$rol           =mysqli_real_escape_string($con, $_POST['rol']);
	

	$password      =mysqli_real_escape_string($con, $_POST['password']);


	
	$sql = "INSERT INTO users (voornaam, tussenvoegsel, achternaam, username, email, gebruikersrol, password)
			VALUES (
					'$voornaam',
					'$tussenvoegsel',
					'$achternaam',
					'$username',
					'$email',
					'$rol',
					'$password'
				)";

	$query = mysqli_query($con, $sql);

	if (!$query) {
		$msg = urlencode(trigger_error('query niet gelukt. geprobeerde query was ' . $sql));
		header('location: ../createUser.php?msg='.$msg);	
	}

	$msg = urlencode('Gebruiker <b>' . $username . '</b> is succesvol toegevoegd.');
	header ('location: ../createUser.php?msg='.$msg);
}

if ( isset($_POST['input_customer']) ) 

{
	$companyName      	=mysqli_real_escape_string($con, $_POST['companyName']);
	$address 			=mysqli_real_escape_string($con, $_POST['address']);
	$postcode    		=mysqli_real_escape_string($con, $_POST['postcode']);
	$maxAmount    		=mysqli_real_escape_string($con, $_POST['maxAmount']);
	$residence      	=mysqli_real_escape_string($con, $_POST['residence']);
	$telephonenumber    =mysqli_real_escape_string($con, $_POST['telephonenumber']);
	$email           	=mysqli_real_escape_string($con, $_POST['email']);
		

	$sql = "INSERT INTO customers (companyName, address, postcode, maxAmount residence, telephonenumber, email)
			VALUES (
					'$companyName',
					'$address',
					'$postcode',
					1000,
					'$residence',
					'$telephonenumber',
					'$email'
					
	)";

	$query = mysqli_query($con, $sql);

	if (!$query) {
		$msg = urlencode(trigger_error('query niet gelukt. geprobeerde query was ' . $sql));
		header('location: ../sales/index.php?msg='.$msg);	
	}

	$msg = urlencode('bedrijf <b>' . $companyName . '</b> is succesvol toegevoegd.');
	header ('location: ../sales/index.php?msg='.$msg);
}