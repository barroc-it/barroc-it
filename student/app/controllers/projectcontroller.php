<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';

if (isset($_POST['createUser'] ) ) {

	$username = mysqli_real_escape_string($con, $_POST['username']);
	$skype_id = mysqli_real_escape_string($con, $_POST['skype_id']);
	
	$sql = "INSERT INTO contacten1 (naam, skype_id) VALUES ('$username', '$skype_id')";

	if( $query = mysqli_query($con, $sql)){
		$msg = "gebruiker is succesvol aangemaakt";
		header('location: ../../index.php');
	}else{
		echo "kan de query niet uitvoeren";
	}
}


if (isset($_GET['delete'])){
	$id = $_GET['id'];
	$sql= "DELETE FROM contacten1 WHERE id = '$id'";

	if ($query = mysqli_query($con, $sql)) {
		header("location: ../../index.php");

	}else{
		echo "foutje met de verwijder query..";
	}
}

?>