<?php
	include '../templates/header.php';
	require '../../config/config.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM comments WHERE id = '$id'";
	
	if ( isset($_GET['id']) ) {
		if ($query = mysqli_query($con, $sql)) {
 		header("location: index.php");
	} else {
 		echo "foutje met de verwijder query..";
 		}
	}

?>