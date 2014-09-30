

<?php

require '../../config/config.php';
if ( isset($_POST['create_projects']) ) 

$company_name                =mysqli_real_escape_string($con, $_POST['company_name']);
$address 		             =mysqli_real_escape_string($con, $_POST['address']);
$postcode                    =mysqli_real_escape_string($con, $_POST['postcode']);
$residence                   =mysqli_real_escape_string($con, $_POST['residence']);
$contact_persons             =mysqli_real_escape_string($con, $_POST['contact_persons']);
$telephone_number            =mysqli_real_escape_string($con, $_POST['telephone_number']);
$fax_number                  =mysqli_real_escape_string($con, $_POST['fax_number']);
$email                       =mysqli_real_escape_string($con, $_POST['email']);
$maintenance_contract        =mysqli_real_escape_string($con, $_POST['maintenance_contract']);
$open_projects               =mysqli_real_escape_string($con, $_POST['open_projects']);
$applications                =mysqli_real_escape_string($con, $_POST['applications']);
$hardware                    =mysqli_real_escape_string($con, $_POST['hardware']);
$software                    =mysqli_real_escape_string($con, $_POST['software']);
$appointments                =mysqli_real_escape_string($con, $_POST['appointments']);
$internal_contact_person     =mysqli_real_escape_string($con, $_POST['internal_contact_person']);





$sql = "INSERT INTO projecten (company_name, address, postcode, residence, contact_persons, telephone_number, fax_number, email, maintenance_contract,
 open_projects, applications, hardware, software, appointments, internal_contact_person)
			VALUES (
				'$company_name',
				'$address',
				'$postcode',
				'$residence',
				'$contact_persons',
				'$telephone_number',
				'$fax_number',
				'$email',
				'$maintenance_contract',
				'$open_projects',
				'$applications',
				'$hardware',
				'$software',
				'$appointments',
				'$internal_contact_person',

						)";

	$query = mysqli_query($con, $sql);

	if (!$query) {
		$msg = urlencode(trigger_error('query niet gelukt. geprobeerde query was ' . $sql));
		header('location: ../development/create_projects.php?msg='.$msg);	
	}

	$msg = urlencode('project  is succesvol toegevoegd.');
	header ('location: ../development/create_projects.php?msg='.$msg);

				





?>