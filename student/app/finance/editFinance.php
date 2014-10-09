
<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';
?>
<?php

if ( isset($_GET['customerNR']) ) {
	$customerNR = $_GET['customerNR'];
	$sql = "SELECT * FROM customers WHERE customerNR = '$customerNR'";

	if (!$query = mysqli_query($con, $sql)) {
		echo 'Kan selectie niet uitvoeren';
		die();
		}
	$row = mysqli_fetch_assoc($query);
	} else {
		header('location: index.php');
	}

	if ( isset($_POST['submit']) ) {
		$companyName = mysqli_real_escape_string($con, $_POST['companyName']);
		$banknumber = mysqli_real_escape_string($con, $_POST['banknumber']);
		$krediet = mysqli_real_escape_string($con, $_POST['krediet']);
		$omzetbedrag = mysqli_real_escape_string($con, $_POST['omzetbedrag']);
		$limiet = mysqli_real_escape_string($con, $_POST['limiet']);
		$grootboekingsnummer = mysqli_real_escape_string($con, $_POST['grootboekingsnummer']);
		$bkr_controle = mysqli_real_escape_string($con, $_POST['bkr_controle']);
	
		$sql = "UPDATE customers SET companyName = '$companyName', banknumber = '$banknumber', krediet = '$krediet', omzetbedrag = '$omzetbedrag', 
		limiet = '$limiet', grootboekingsnummer = '$grootboekingsnummer', bkr_controle = '$bkr_controle' WHERE customerNR = '$customerNR'";

		if (!$query = mysqli_query($con, $sql)) {
			echo 'Kan helaas niet updaten...';
			die();
		}
		$msg = urlencode('Invoice changed!');
		header('location: index.php?msg=' . $msg );
	}

?>

<style>
	.editform {
		margin: 0 auto;
		width: 500px;
	}
</style>

<div class="editform">
	<h1>Edit invoices</h1>
</div>

<form action="" method="POST" class="editform">
	<div class="form-group col-sm-12">
		<label for="companyName">Companyname</label>
		<input type="text" value='<?php echo $row['companyName']; ?>' class="form-control" name="companyName" customerNR="companyName">
	</div>
	<div class="form-group col-sm-12">
		<label for="banknumber">Bank account number</label>
		<input type="text" value='<?php echo $row['banknumber']; ?>' class="form-control" name="banknumber" customerNR="banknumber">
	</div>
	<div class="form-group col-sm-12">
		<label for="krediet">Credit</label>
		<input type="text" value='<?php echo $row['krediet']; ?>' class="form-control" name="krediet" customerNR="krediet">
	</div>
	<div class="form-group col-sm-12">
		<label for="omzetbedrag">Revenue ammount</label>
		<input type="text" value='<?php echo $row['omzetbedrag']; ?>' class="form-control" name="omzetbedrag" customerNR="omzetbedrag">
	</div>
		<div class="form-group col-sm-12">
		<label for="limiet">limit</label>
		<input type="text" value='<?php echo $row['limiet']; ?>' class="form-control" name="limiet" customerNR="limiet">
	</div>
		<div class="form-group col-sm-12">
		<label for="grootboekingsnummer">Reservation number</label>
		<input type="text" value='<?php echo $row['grootboekingsnummer']; ?>' class="form-control" name="grootboekingsnummer" customerNR="grootboekeingsnummer">
	</div>
		<div class="form-group col-sm-12">
		<label for="bkr_controle">BKR</label>
		<input type="text" value='<?php echo $row['bkr_controle']; ?>' class="form-control" name="bkr_controle" customerNR="bkr_controle">
	</div>
	<div class="form-group col-sm-12">
		<input name="submit" type="submit" value="Bewerken" class="btn btn-default btn-lg btn-block">
	</div>

</body>
</html>