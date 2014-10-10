<?php 
session_start();
require '../config/config.php'; 
require 'templates/header.php';
 ?>

<?php 

if (!isset($_SESSION['name'])) {
	$msg = urlencode('u dient ingelogd te zijn');
	header('location:login.php?msg=' . $msg);
}

 

 $role = $_SESSION['role'];
 switch ($role) {
 	case 1:
 		$_SESSION['login'] = 1;
 		header('location:sales');
 		break;
 	case 2:
 		$_SESSION['login'] = 2;
 		header('location:finance');
 		break;
 	case 3:
 		$_SESSION['login'] = 3;
 		header('location:development');
 		break;


 	default:
 		header('location:controllers/authController.php?logout=true');
 		break;
 }

  


require 'templates/footer.php'; 
?>