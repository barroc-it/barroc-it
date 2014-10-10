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
	
	<div class="container">
		<h1>Finance</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Companyname</th>
					<th>bank account number</th>
					<th>Credit</th>
					<th>Revenue ammount</th>
					<th>Limit</th>
					<th>Reservation number</th>
					<th>BKR</th>
					<th>Activated invoices</th>
					<th>Deactivated invoices</th>
					<th>edit</th>
					<th>invoice number</th>
				</tr>
			</thead>
					
			<tbody class="finance">
				<?php 
					$sql = "SELECT * FROM customers" ;
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {

						echo '<tr>';
						echo '<td>' . $row['companyName'] . '</td>';
						echo '<td>' . $row['banknumber'] . '</td>';
						echo '<td>' . $row['krediet'] . '</td>';
						echo '<td>' . $row['omzetbedrag'] . '</td>';
						echo '<td>' . $row['limiet'] . '</td>';
						echo '<td>' . $row['grootboekingsnummer'] . '</td>';
						echo '<td>' . $row['bkr_controle'] . '</td>';
						echo '<td><a href="activate.php">View</a></td>';
						echo '<td><a href="deactivate.php">View</a></td>';
						echo '<td><a href="editFinance.php?customerNR='.$row['customerNR'] . '">Edit</a></td>';

						echo '</tr>';
						}
					?>
	
<?php 
	include '../templates/footer.php'; 
	?>