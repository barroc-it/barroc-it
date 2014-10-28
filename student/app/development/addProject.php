<?php 
	include '../templates/header.php';
	require '../../config/config.php';

$customerNR = $_GET['customerNR'];


	if (isset($_POST['submit'] ) ) {
		
		$maintenance_contract = mysqli_real_escape_string($con, $_POST['maintenance_contract']);
		$software = mysqli_real_escape_string($con, $_POST['software']);
		$hardware = mysqli_real_escape_string($con, $_POST['hardware']);
		$description = mysqli_real_escape_string($con, $_POST['description']);
		
		$sql = "INSERT INTO projects (customerNR, maintenance_contract, software, hardware, description)
		VALUES ('$customerNR','$maintenance_contract', '$software', '$hardware', '$description')";
			// $msg = "project is succesvol toegevoegd";
		$query = mysqli_query($con, $sql);

		if(!$query) {
			$msg = urlencode(trigger_error('query niet gelukt' .$sql));
			header('location:index.php?msg='.$msg);
		}
		$msg = urlencode('project is succesvol toegevoegd');
		header ('location:index.php?msg='.$msg);
		}
	

?>

<form action="" method="POST" class="editform"> 
	<div class="form-group col-md-12">
		<label for="maintenance_contract">maintenance_contract</label>
		<input type="text"  class="form-control" name="maintenance_contract" id="maintenance_contract">
	</div>



	<div class="form-group col-md-12">
		<label for="software">software</label>
		<input type="text"  class="form-control" name="software" id="software">
	</div>
	<div class="form-group col-md-12">
		<label for="hardware">hardware</label>
		<input type="text"  class="form-control" name="hardware" id="hardware">
	</div>
	<div class="form-group col-md-12">
		<label for="description">Description</label>
		<input type="text"  class="form-control" name="description" id="description">
	</div>

	<div class="form-group col-md-12">
		<input name="submit" type="submit" value="addProject" class="btn btn-default">
	</div>
</form>