<?php
	include '../templates/header.php';
	require '../../config/config.php';
	session_start();
if($_SESSION['login'] == 1) {  
} else {
	header("location:../login.php");
}

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