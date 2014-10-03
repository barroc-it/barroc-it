<?php 

	include '../templates/header.php'; 
	require '../../config/config.php';

// if (isset($_POST['createUser'] ) ) {
	
// 	$sql = "INSERT INTO contacten1 (naam, skype_id) VALUES ('$username', '$skype_id')";

// 	if( $query = mysqli_query($con, $sql)){
// 		$msg = "gebruiker is succesvol aangemaakt";
// 		header('location: ../../index.php');
// 	}else{
// 		echo "kan de query niet uitvoeren";
// 	}
// }


// if (isset($_GET['delete'])){
// 	$id = $_GET['id'];
// 	$sql= "DELETE FROM projectentest WHERE id = '$id'";

// 	if ($query = mysqli_query($con, $sql)) {
// 		header("location: ../index.php");

// 	} else {
// 		echo "foutje met de verwijder query..";
// 	}
// }

	$id = $_GET['id'];
	$sql = "DELETE FROM projectentest WHERE id = '$id'";
	
		if ( isset($_GET['delete']) ) {
		

		if ($query = mysqli_query($con, $sql)) {
 		header("location: ../index.php");

 	} else {
 		echo "foutje met de verwijder query..";
 	}
}

if (!$con)
	{
		echo 'Kan geen connectie maken met de database';
		die();
	}

if ( isset($_GET['id']) ) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM projectentest WHERE id = '$id'";

	if (!$query = mysqli_query($con, $sql)) {
		echo 'Kan selectie niet uitvoeren';
		die();
	}
	$row = mysqli_fetch_assoc($query);
} else {
	header('location: index.php');
}

	if ( isset($_POST['submit']) ) {
		$opdrachtgever = mysqli_real_escape_string($con, $_POST['opdrachtgever']);
		$project = mysqli_real_escape_string($con, $_POST['project']);
		$postcode = mysqli_real_escape_string($con, $_POST['postcode']);
		$telefoonnummer = mysqli_real_escape_string($con, $_POST['telefoonnummer']);
	
		$sql = "UPDATE projectentest SET opdrachtgever = '$opdrachtgever', project = '$project', postcode = '$postcode', telefoonnummer = '$telefoonnummer' WHERE id = '$id'";

		if (!$query = mysqli_query($con, $sql)) {
			echo 'Kan helaas niet updaten...';
			die();
		}
		$msg = urlencode('Project changed!');
		header('location: ../index.php?msg=' . $msg );
	}

?>

<div class="page-header">
	<h1>Edit project</h1>
</div>

<form action="" method="POST">
	<div class="form-group col-sm-12">
		<label for="titel">Opdrachtgever</label>
		<input type="text" value='<?php echo $row['opdrachtgever']; ?>' class="form-control" name="opdrachtgever" id="opdrachtgever">
	</div>
	<div class="form-group col-sm-12">
		<label for="uitgever">Project</label>
		<input type="text" value='<?php echo $row['project']; ?>' class="form-control" name="project" id="project">
	</div>
	<div class="form-group col-sm-12">
		<label for="genre">Postcode</label>
		<input type="text" value='<?php echo $row['postcode']; ?>' class="form-control" name="postcode" id="postcode">
	</div>
	<div class="form-group col-sm-12">
		<label for="omschrijving">Telefoonnummer</label>
		<input type="telefoonnummer" class="form-control"  id="telefoonnummer"><?php echo $row['telefoonnummer']; ?>
	</div>
	<div class="form-group col-sm-12">
		<input name="submit" type="submit" value="Bewerken" class="btn btn-default btn-lg btn-block">
	</div>

</body>
</html>

?>