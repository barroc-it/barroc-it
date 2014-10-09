<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';
?>

<?php
if (isset($_GET['delete'])){
	$id = $_GET['invoices NR'];
	$sql= "DELETE FROM invoices WHERE invoicesNR = '$invoicesNR'";

	if ($query = mysqli_query($con, $sql)) {
		header("location: activate.php");

	}else{
		echo "foutje met de verwijder query..";
	}
}

?>