
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
		$description = mysqli_real_escape_string($con, $_POST['description']);
		$bankNumber = mysqli_real_escape_string($con, $_POST['bankNumber']);
		$credit = mysqli_real_escape_string($con, $_POST['credit']);
		$salesAmount = mysqli_real_escape_string($con, $_POST['salesAmount']);
		$maxAmount = mysqli_real_escape_string($con, $_POST['maxAmount']);
		$largeReservationNumber = mysqli_real_escape_string($con, $_POST['largeReservationNumber']);
		$bkr_control = mysqli_real_escape_string($con, $_POST['bkr_control']);
	
		$sql = "UPDATE customers SET companyName = '$companyName',  description = '$description', bankNumber = '$bankNumber', credit = '$credit',  	
		salesAmount = '$salesAmount', maxAmount = '$maxAmount', largeReservationNumber = '$largeReservationNumber', bkr_control = '$bkr_control' WHERE customerNR = '$customerNR'";

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
		<label for="description">Omschrijving</label>
		<input type="text" value='<?php echo $row['description']; ?>' class="form-control" name="description" customerNR="description">
	</div>
	<div class="form-group col-sm-12">
		<label for="bankNumber">Bank account number</label>
		<input type="text" value='<?php echo $row['bankNumber']; ?>' class="form-control" name="bankNumber" customerNR="bankNumber">
	</div>
		<div class="form-group col-sm-12">
<<<<<<< HEAD
		<label for="maxAmount">limit</label>
		<input type="text" value='<?php echo $row['maxAmount']; ?>' class="form-control" name="maxAmount" customerNR="maxAmount">
=======
		<label for="maxAmount">Limit</label>
		<input type="text" value='<?php echo $row['maxAmount']; ?>' class="form-control" name="maxAmount" customerNR="limit">
>>>>>>> origin/master
	</div>
		<div class="form-group col-sm-12">
		<label for="largeReservationNumber">Reservation number</label>
		<input type="text" value='<?php echo $row['largeReservationNumber']; ?>' class="form-control" name="largeReservationNumber" customerNR="largeReservationNumber">
	</div>
		<div class="form-group col-md-8">
			<label class="col-md-3" for="bkr_control">BKR</label>
				<select name="bkr_control" class="form-control" name="bkr_control" customerNR="bkr_control">
	<?php 
	if ($row['bkr_control'] == 0) {
		echo '<option value="0">No</option>';
		echo '<option value="1">Yes</option>';
	} else {
		echo '<option value="1">Yes</option>';
		echo '<option value="0">No</option>';
	}
	?>
		</select>
	</div>
	<div class="form-group col-sm-12">
		<input Type="button" VALUE="Cancel" onClick="history.go(-1);return true;" class="btn btn-primary btn-lg btn-block">
		<input name="submit" type="submit" value="Bewerken" class="btn btn-primary btn-lg btn-block">
	</div>

</body>
</html>