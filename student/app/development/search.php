<?php	
	include '../templates/header.php'; 
	require '../../config/config.php';

	// checkt of hij verbinding heeft met database
	if (!$con) {
		echo 'Kan geen connectie maken met de database';
		die();
	}

		// indien geen zoekterm gepost is, stoppen... 
		if(!isset($_POST['search'])){
		    die();
		    };

		// omzetten variabelen
		$search = $_POST['search'];

		// checken op een leeg invoerveld, zo ja, stoppen...
		if(strlen($search)=="0"){
		    echo '<p align="center"><strong>Er is niets ingevuld</strong></p>';
		    die("");
		    }

		// indien in alle kolommen gezocht wil worden, volgend scenario uitvoeren
		if($search=='alles'){

		$selectie="SELECT * FROM customers WHERE ('customerNR' LIKE '%$customerNR') OR
		                                         ('companyName' LIKE '%$companyName%') OR
		                                         ('customerNR' LIKE '%$search%') OR
		                                         ('address' LIKE '%$address%') OR
		                                         ('postcode' LIKE '%$postcode%')";
		$selectiequery = mysqli_query($selectie);
		$aantal = mysqli_num_rows($selectiequery);

		}


		// indien niet in alle kolommen gezocht wil worden, volgend scenario uitvoeren
		else {

		$sql = "SELECT * FROM customers WHERE $search LIKE '%$search%' ";
		$selectiequery = mysqli_query($sql, $con);
		$aantal = mysqli_num_rows($selectiequery);
		}


		// als het aantal uitkomsten nul is:
		if($aantal=="0"){
		    echo ' <p align="center"><strong>Geen resultaten</strong></p> ';
		    die();
		    }

		// Weergeven van resultaten
		$kop="Er zijn ".$aantal." resultaten gevonden";