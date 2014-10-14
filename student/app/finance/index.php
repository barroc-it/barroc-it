<?php 
session_start();
if($_SESSION['login'] == 2) {  


}
else
{
header("location:../login.php");
}
	include '../templates/header.php'; 
	require '../../config/config.php';
?>
<div class="navibar">
		<ul class="navibarbutton">
			<li><a class="active" href="index.php">Home</a></li>
			<li><a class="menutext" href="deactivefinance.php">Deactivated invoices</a></li>		
		</ul>
	
	<div class="container">
		<h1>Finance</h1>
		<table class="table table-striped sortable">
			<thead>
				<tr>
					<th>Companyname</th>
					<th>Omschrijving</th>
					<th>bank account number</th>
					<th>Credit</th>
					<th>Revenue ammount</th>
					<th>Limit</th>
					<th>Reservation number</th>
					<th>BKR</th>
					<th>Activated invoices</th>
					<th>edit</th>
					<th>invoice number</th>
				</tr>
			</thead>
					
			<tbody class="finance">
				<?php 
					
					$sql = "SELECT * FROM customers";;
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {

						echo '<tr>';
						echo '<td>' . $row['companyName'] . '</td>';
						echo '<td>' . $row['description'] . '</td>';
						echo '<td>' . $row['bankNumber'] . '</td>';
						echo '<td>' . $row['credit'] . '</td>';
						echo '<td>' . $row['salesAmount'] . '</td>';
						echo '<td>' . $row['limit'] . '</td>';
						echo '<td>' . $row['largeReservationNumber'] . '</td>';
						echo '<td>' . $row['bkr_control'] . '</td>';
						echo '<td><a href="activate.php?id='.$row['customerNR']. '">View</a></td>';
						echo '<td><a href="editFinance.php?customerNR='.$row['customerNR'] . '">Edit</a></td>';

						echo '</tr>';
						}
					?>
	
<?php 
	include '../templates/footer.php'; 
	?>