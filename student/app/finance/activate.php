<?php 
	include '../templates/header.php'; 
	require '../../config/config.php';




	
		
			/*echo '<a href="index.php"><button>Kan selectie niet uitvoeren, Klik hier om terug te gaan.</button></a>';
			die();*/
		
	
?>
	
	<div class="container">
		<h1>Finance panel Activate</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Invoice duration</th>
					<th>amount</th>
					<th>Description</th>
					<th>Price</th>
					<th>BTW</th>
					<th>Amount</th>
					<th>Deactivate</th>
				</tr>
			</thead>
					
			<tbody class="finance">
				<?php 
<<<<<<< HEAD

				if ( isset($_GET['id']) ) {
				$id = $_GET['id'];
				$sql = "SELECT * FROM invoices WHERE projectNR = '$id' ";
				$query = mysqli_query($con, $sql);
=======
					$projectNR = $_GET['customerNR'];
					$sql = "SELECT * FROM invoices WHERE projectNR = '$projectNR' ";
					$query = mysqli_query($con, $sql);
						while ($row = mysqli_fetch_assoc($query)) {
							echo '<tr>';
							echo '<td>' . $row['date'] . '</td>';
							echo '<td>' . $row['amount'] . '</td>';
							echo '<td>' . $row['description'] . '</td>';
							echo '<td>' . $row['paid'] . '</td>';
							echo '<td>' . $row['BTW'] . '</td>';
							echo '<td><a href="activateEdit.php">Edit</a></td>';
							echo '<td><a href="deactivefinance.php?invoicesNR=' . $row['projectNR'] . '">Deactivate</a>';
							echo '</tr>';
						}
>>>>>>> origin/master
				while($row = mysqli_fetch_assoc($query))
				{
						echo '<tr>';
						echo '<td>' . $row['date'] . '</td>';
						echo '<td>' . $row['quintity'] . '</td>';
						echo '<td>' . $row['description'] . '</td>';
						echo '<td>' . $row['price'] . '</td>';
						echo '<td>' . $row['btw'] . '</td>';
						echo '<td>' . $row['amount'] . '</td>';
						echo '<td><a href="activateEdit.php">Edit</a></td>';
<<<<<<< HEAD
						echo '<td><a href="deactivefinance.php?invoicesNR=' . $row['projectNR'] . '">Deactivate</a>';
					
=======
						echo '<td><a href="deactivefinance.php?invoicesNR=' . $row['projectsNR'] .  '&delete=true">Deactivate</a>';
>>>>>>> origin/master
						echo '</tr>';
				}

	}



/*
	$sql = "SELECT * FROM invoices";
		$query = mysqli_query($con, $sql);
					{
						echo '<tr>';
						echo '<td>' . $row['datum'] . '</td>';
						echo '<td>' . $row['hoeveelheid'] . '</td>';
						echo '<td>' . $row['description'] . '</td>';
						echo '<td>' . $row['bedrag'] . '</td>';
						echo '<td>' . $row['btw'] . '</td>';
						echo '<td>' . $row['amount'] . '</td>';
						echo '<td><a href="activateEdit.php">Edit</a></td>';
						echo '<td><a href="deactivefinance.php?invoicesNR=' . $row['projectsNR'] .  '&delete=true">Deactivate</a>';
					
						echo '</tr>';
						}*/
					?>

<?php 
	include '../templates/footer.php'; 
	?>
	<a href="index.php">Back</a>