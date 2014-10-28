<?php 
session_start();
if($_SESSION['login'] == 2) {  

} else {
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
	<div class="searchform">
		<form method="GET" action="indexsearch.php" name="search"> 
			   <input type="text" class="form-control" placeholder="Search..." name="search">
		</form>
	</div>
		<input type="submit" class="searchbtn">
		<a class="btn btn-info col-md-2 col-md-offset-2 btn-sm" href="logout.php">logout</a>
</div>
	<div class="container">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Companyname</th>
					<th>Description</th>
					<th>Startdate</th>
					<th>Enddate</th>
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
					
					$sql = "SELECT * FROM customers";
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {

						echo '<tr>';
						echo '<td>' . $row['companyName'] . '</td>';
						echo '<td>' . $row['description'] . '</td>';
						echo '<td>' . $row['start_date'] . '</td>';
						echo '<td>' . $row['end_date'] . '</td>';
						echo '<td>' . $row['bankNumber'] . '</td>';
						echo '<td>' . $row['credit'] . '</td>';
						echo '<td>' . $row['salesAmount'] . '</td>';
						echo '<td>' . $row['limit'] . '</td>';
						echo '<td>' . $row['largeReservationNumber'] . '</td>';
						echo '<td>' . $row['bkr_control'] . '</td>';
						echo '<td><a href="activate.php?projectNR='.$row['customerNR']. '">View</a></td>';
						echo '<td><a href="editFinance.php?customerNR='.$row['customerNR'] . '">Edit</a></td>';

						echo '</tr>';
						}
					?>
				</tbody>
			</table>
			<a class="btn btn-primary col-md-2" href="add_custumers.php">toevoegen</a>
	
<?php 
	include '../templates/footer.php'; 
	?>