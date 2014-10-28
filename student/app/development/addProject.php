<?php 
	include '../templates/header.php';
	require '../../config/config.php';

	if (isset($_POST['createUser'] ) ) {
		
		$sql = "INSERT INTO projectentest (opdrachtgever, project) VALUES ('$opdrachtgever', '$project')";

		if( $query = mysqli_query($con, $sql)){
			$msg = "Klant is succesvol toegevoegd";
			header('location: ../../index.php');
		}else{
			echo "kan de query niet uitvoeren";
		}
	}

?>

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