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
		$query = mysqli_query($con, $sql);

		if(!$query) {



			$msg = urlencode(trigger_error('Project toevoegen is mislukt' . $sql));
			header('location: projecten.php?customerNR=' . $customerNR . '&' . $msg);


			$msg = urlencode(trigger_error('query niet gelukt' .$sql));
			header('location:index.php?msg='.$msg);
		}
		$msg = urlencode('project is succesvol toegevoegd');

		header ('location:projecten.php?customerNR='.$customerNR);
	
			$msg = urlencode('project is succesvol toegevoegd');

		header('location: projecten.php?customerNR=' . $customerNR . '&' . $msg);


			$msg = urlencode(trigger_error('Project toevoegen is mislukt' . $sql));

			header('location: projecten.php?customerNR=' . $customerNR . '&' . $msg);


			$msg = urlencode(trigger_error('Project toevoegen is mislukt' . $sql));
			header('location: projecten.php?customerNR=' . $customerNR . '&' . $msg);
		}
		$msg = urlencode('project is succesvol toegevoegd');
		header ('location:projecten.php?customerNR='.$customerNR);

		}
?>

	<div class="container">
		<div class="page-header">
			<h1>Development Customers</h1>
		</div>
		<form action="" method="POST" class="editform"> 
			<div class="form-group col-md-8">
				<label class="col-md-3" for="maintenance_contract">maintenance_contract</label>
					<select name="maintenance_contract" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
			</div>
			<div class="form-group col-md-8">
				<label class="col-md-3" for="software">software:</label>
				<input class="col-md-6" type="text"  class="form-control" name="software" id="software">
			</div>
			<div class="form-group col-md-8">
				<label class="col-md-3" for="hardware">hardware:</label>
				<input class="col-md-6" type="text"  class="form-control" name="hardware" id="hardware">
			</div>
			<div class="form-group col-md-8">
				<label class="col-md-3" for="description">Description:</label>
				<input class="col-md-6" type="text"  class="form-control" name="description" id="description">
			</div>
			<div class="form-group col-md-8">	
				
				<input name="submit" type="submit" value="Add Project" class="btn btn-primary">
			</div>
		</form>
	</div>
