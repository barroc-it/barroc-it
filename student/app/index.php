<?php require 'templates/header.php'; ?>

<?php 

if (!isset($_SESSION['name'])) {
	$msg = urlencode('u dient ingelogd te zijn');
	header('location:login.php?msg=' . $msg);
}

 

 $role = $_SESSION['role'];
 switch ($role) {
 	case 1:
 		header('location:finance');
 		break;
 	case 2:
 		header('location:rd');
 		break;
 	case 3:
 		header('location:hrm');
 		break;
 	case 4:
 		header('location:it');
 		break;
 	case 5:
 		header('location:admin');
 		break;
 	default:
 		header('location:controller/authController.php?logout=true');
 		break;
 }

  

if ( isset($_SESSION['name']) ) {
	echo 'Welkom, ' . $_SESSION['name'];
}

?>

<div class="container">
<p>Hier mag je niet kunnen komen als je niet bent ingelogd!</p>
<a href="admin.php">naar Admin pagina</a>
<a href="controllers/authController.php?logout=treu">uitloggen</a>
</div>




<?php require 'templates/footer.php'; ?>