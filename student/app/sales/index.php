<?php 
session_start();
if($_SESSION['login'] == 1) {  

} 
else
{
header("location:../login.php");
}

	include '../templates/header.php'; 
	require '../../config/config.php'; 
?>
<div class="container">
	<div class="page-header">
		<h2>sales</h2>
		<h3>customers</h3>
	</div>
	
	<a class="btn btn-primary col-md-2" href="add_custumers.php">toevoegen</a>
	<a class="btn btn-info col-md-2 col-md-offset-8" href="logout.php">logout</a>
	<br>
	<br>
	<br>
		<div class="">
			<form  method="GET" action="indexsearch.php" id="searchform" name="search"> 
			    <input id="search-bar" type="text" class="form-control inputsearch" placeholder="Search..." name="search"> 
			    <input type="submit" class="search-btn"> 
			</form> 
		</div>
	<br>

	<div class="customers">
	<table class="table table-striped">
		<tr>
			<th>companyName</th>
			<th>address</th>
			<th>postcode</th>
			<th>residence</th>
			<th>telephonenumber</th>
			<th>email</th>
			<th>edit</th>
			<th>appointments</th>
		</tr>
			<?php 
			$sql = "SELECT * FROM customers";
			$query = mysqli_query($con, $sql);

			while ($row = mysqli_fetch_assoc($query)) {
				echo "<tr>";
					echo "<td>" . $row['companyName'] . "</td>";
					echo '<td>' . $row['address'] . '</td>';
					echo '<td>' . $row['postcode'] . '</td>';
					echo '<td>' . $row['residence'] . '</td>';
					echo '<td>' . $row['telephoneNumber'] . '</td>';
					echo '<td>' . $row['email'] . '</td>';
					echo '<td> <a href="custumersEdit.php?customerNR=' . $row['customerNR'] . '">edit</td>';
					echo '<td> <a href="appointments.php">Appointments</td>';
					
				echo "</tr>";
			}
		?>




	</div>
</div>

<?php 
	include '../templates/footer.php'; 
	?>
