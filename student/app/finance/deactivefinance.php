<?php 
	include '../templates/header.php';
	require '../../config/config.php';
?>

<style>

	body {
		min-width: 900px;
	}
</style>

<header>
	<div class="navibar">
		<ul class="navibarbutton">
			<li><a class="menutext" href="index.php">Home</a></li>
			<li><a class="menutext" href="deactivatedfinance.php">Deactivated invoices</a></li>		
		</ul>
		<div class="searchitem">
			<form  method="post" action="search.php?go" id="searchform" name="search"> 
			    <input  type="text" class="form-control inputsearch" value="Search..." name="search"> 
			    <input  type="submit" class="search-btn" name="submit" value""> 
			</form> 
		</div>
		<a href=""><button class="blue-btn">ADD</button></a>
	</div>
</header>

<?php

	if ( isset($_GET['invoicesNR']) ) {
		
		$projectsNR = $_GET['invoicesNR'];
		$sql = "SELECT * FROM invoices";

		if (!$query = mysqli_query($con, $sql)) {
			echo '<a href="index.php"><button class="blue-btn2" style="font-size: 20px; height: 100px; width: 350px; float: left; margin-top: 10px; margin-left: 35%;">Kan selectie niet uitvoeren,<br>Klik hier om terug te gaan.</button></a>';
			die();
			}
		$row = mysqli_fetch_assoc($query);
		}

?>
<div class="container">
		<h1>Finance panel Activate</h1>
		<table class="table table-striped sortable">
			<thead>
				<tr>
					<th>Invoice duration</th>
					<th>Quintity</th>
					<th>Description</th>
					<th>Price</th>
					<th>BTW</th>
					<th>Amount</th>
					<th>Edit</th>
					<th>Activate</th>
				</tr>
			</thead>
					
				<tbody class="finance">
				<?php 
					if ( isset($_GET['id']) ) {
					$id= $_GET['id'];
					$sql = "SELECT * FROM invoices WHERE projectNR = '$id'";
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {

						echo '<tr>';
<<<<<<< HEAD
						echo '<td>' . $row['date'] . '</td>';
						echo '<td>' . $row['quintity'] . '</td>';
						echo '<td>' . $row['description'] . '</td>';
						echo '<td>' . $row['price'] . '</td>';
						echo '<td>' . $row['btw'] . '</td>';
						echo '<td>' . $row['amount'] . '</td>';
						echo '<td><a href="activateEdit.php">Edit</a></td>';
						echo '<td><a href="activate.php?id=' . $row['projectNR'] . '">' ?><button class="edit-btn">Activate</button></a></td>
					<?php
=======
						echo '<td>' . $row['companyName'] . '</td>';
						echo '<td>' . $row['bankNumber'] . '</td>';
						echo '<td>' . $row['credit'] . '</td>';
						echo '<td>' . $row['salesAmount'] . '</td>';
						echo '<td>' . $row['limit'] . '</td>';
						echo '<td>' . $row['largeReservationNumber'] . '</td>';
						echo '<td>' . $row['bkr_control'] . '</td>';
						echo '<td><a href="deactivate.php?activate.php">Activate</a></td>';
>>>>>>> origin/master
						echo '</tr>';
				}
			}
						
					?>
			</tbody>
		</table>
	
