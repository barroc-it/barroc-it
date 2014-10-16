
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

	if ( isset($_POST['edit_finance']) ) {
		$companyName = mysqli_real_escape_string($con, $_POST['companyName']);
		$bankNumber = mysqli_real_escape_string($con, $_POST['bankNumber']);
		$credit = mysqli_real_escape_string($con, $_POST['credit']);
		$salesAmount = mysqli_real_escape_string($con, $_POST['salesAmount']);
		$limit = mysqli_real_escape_string($con, $_POST['limit']);
		$largeReservationNumber = mysqli_real_escape_string($con, $_POST['largeReservationNumber']);
		$bkr_control = mysqli_real_escape_string($con, $_POST['bkr_control']);
	
		$sql = "UPDATE customers SET companyName = '$companyName',  bankNumber = '$bankNumber', credit = '$credit',  	
		salesAmount = '$salesAmount', limit = '$limit', largeReservationNumber = '$largeReservationNumber', bkr_control = '$bkr_control' WHERE customerNR = '$customerNR'";

		if (!$query = mysqli_query($con, $sql)) {
			echo 'Kan helaas niet updaten...';
			die();
		}
		$msg = urlencode('Invoice changed!');
		header('location: index.php?msg=' . $msg );
	}

?>

<style>
	.editf0orm {
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
		<label for="bankNumber">Bank account number</label>
		<input type="text" value='<?php echo $row['bankNumber']; ?>' class="form-control" name="bankNumber" customerNR="bankNumber">
	</div>
	
	<div class="form-group col-sm-12">
		<label for="credit">Credit</label>
		<input type="text" value='<?php echo $row['credit']; ?>' class="form-control" name="credit" customerNR="credit">
	</div>
	<div class="form-group col-sm-12">
		<label for="salesAmount">Revenue ammount</label>
		<input type="text" value='<?php echo $row['salesAmount']; ?>' class="form-control" name="salesAmount" customerNR="salesAmount">
	</div>
		<div class="form-group col-sm-12">
		<label for="limit">limit</label>
		<input type="text" value='<?php echo $row['limit']; ?>' class="form-control" name="limit" customerNR="limit">
	</div>
		<div class="form-group col-sm-12">
		<label for="largeReservationNumber">Reservation number</label>
		<input type="text" value='<?php echo $row['largeReservationNumber']; ?>' class="form-control" name="largeReservationNumber" customerNR="largeReservationNumber">
	</div>
		<div class="form-group col-sm-12">
		<label for="bkr_control">BKR</label>
		<input type="text" value='<?php echo $row['bkr_control']; ?>' class="form-control" name="bkr_control" customerNR="bkr_control">
	</div>
	<div class="form-group col-sm-12">
		<input name="edit_finance" type="submit" value="edit" class="btn btn-default btn-lg btn-block">
	</div>

</body>
</html>