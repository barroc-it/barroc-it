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

	// if (isset($_POST['createUser'] ) ) {
		
	// 	$sql = "INSERT INTO projectentest (opdrachtgever, project) VALUES ('$opdrachtgever', '$project')";

	// 	if( $query = mysqli_query($con, $sql)){
	// 		$msg = "Klant is succesvol toegevoegd";
	// 		header('location: ../../index.php');
	// 	}else{
	// 		echo "kan de query niet uitvoeren";
	// 	}
	// }

// klant verwijderen

	$id = $_GET['id'];
	$sql = "DELETE FROM projectentest WHERE id = '$id'";
	
	if ( isset($_GET['delete']) ) {
		if ($query = mysqli_query($con, $sql)) {
 		header("location: ../index.php");
	} else {
 		echo "foutje met de verwijder query..";
 		}
	}

// klant bewerken

if ( isset($_GET['id']) ) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM customers WHERE id = '$id'";

	if (!$query = mysqli_query($con, $sql)) {
		echo 'Kan selectie niet uitvoeren';
		die();
		}
	$row = mysqli_fetch_assoc($query);
	} else {
		header('location: index.php');
	}

	if ( isset($_POST['submit']) ) {
		// $telephoneNumber = mysqli_real_escape_string($con, $_POST['telephoneNumber']);
		// $email = mysqli_real_escape_string($con, $_POST['email']);
		// $aantalFacturen = mysqli_real_escape_string($con, $_POST['aantalFacturen']);
		// $openProjects = mysqli_real_escape_string($con, $_POST['openProjects']);
		// $appointments = mysqli_real_escape_string($con, $_POST['appointments']);
		// $internalContact = mysqli_real_escape_string($con, $_POST['internalContact']);
		// $dateAction = mysqli_real_escape_string($con, $_POST['dateAction']);
		// $lastcontactDate = mysqli_real_escape_string($con, $_POST['lastcontactDate']);
		// $nextAction = mysqli_real_escape_string($con, $_POST['nextAction']);
		// $contactPerson = mysqli_real_escape_string($con, $_POST['contactPerson']);
		// $BTW = mysqli_real_escape_string($con, $_POST['BTW']);
		// $omzetbedrag = mysqli_real_escape_string($con, $_POST['omzetbedrag']);
		// $saldo = mysqli_real_escape_string($con, $_POST['saldo']);
		// $krediet = mysqli_real_escape_string($con, $_POST['krediet']);
		// $limiet = mysqli_real_escape_string($con, $_POST['limiet']);
		// $grootboekingsnummer = mysqli_real_escape_string($con, $_POST['grootboekingsnummer']);
		// $offerStatus = mysqli_real_escape_string($con, $_POST['offerStatus']);
		// $prospect = mysqli_real_escape_string($con, $_POST['prospect']);
		// $bkr_controle = mysqli_real_escape_string($con, $_POST['bkr_controle']);
	
		// $sql = "UPDATE customers SET companyName = '$companyName', address = '$address', postcode = '$postcode', residence = '$residence', telephoneNumber = '$telephoneNumber', email = '$email', aantalFacturen = '$aantalFacturen', openProjects = '$openProjects', appointments = '$appointments', internalContact = '$internalContact', dateAction = '$dateAction', lastcontactDate = '$lastcontactDate', nextAction = '$nextAction', contactPerson = '$contactPerson', BTW = '$BTW', omzetbedrag = '$omzetbedrag', saldo = '$saldo', krediet = '$krediet', limiet = '$limiet', grootboekingsnummer = '$grootboekingsnummer', offerStatus = '$offerStatus', prospect = '$prospect' WHERE customerNR = '$customerNR'";

		if (!$query = mysqli_query($con, $sql)) {
			echo 'Kan helaas niet updaten...';
			die();
		}
		$msg = urlencode('Project changed!');
		header('location: ../index.php?msg=' . $msg );
	}

?>

<div class="editform">
	<h1>Edit project</h1>
</div>

<form action="" method="POST" class="editform">
	<div class="form-group col-sm-12">
		<label for="opdrachtgever">Opdrachtgever</label>
		<input type="text" value='<?php echo $row['opdrachtgever']; ?>' class="form-control" name="opdrachtgever" id="opdrachtgever">
	</div>
	<div class="form-group col-sm-12">
		<label for="project">Project</label>
		<input type="text" value='<?php echo $row['project']; ?>' class="form-control" name="project" id="project">
	</div>
	<div class="form-group col-sm-12">
		<label for="postcode">Postcode</label>
		<input type="text" value='<?php echo $row['postcode']; ?>' class="form-control" name="postcode" id="postcode">
	</div>
	<div class="form-group col-sm-12">
		<label for="telefoonnummer">Telefoonnummer</label>
		<input type="text" value='<?php echo $row['telefoonnummer']; ?>' class="form-control" name="telefoonnummer" id="telefoonnummer">
	</div>
	<div class="form-group col-sm-12">
		<input name="submit" type="submit" value="Bewerken" class="btn btn-default btn-lg btn-block">
	</div>

<?php include '../templates/footer.php'; ?>