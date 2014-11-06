<?php 
session_start();
if($_SESSION['login'] == 1) {  
} else {
	header("location:../login.php");
}
	include '../templates/header.php'; 
	require '../../config/config.php'; 
?>
<div class="navibar">
		<ul class="navibarbutton">
			<li><a class="active" href="index.php">Home</a></li>		
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
	<div class="page-header">
		<h2>sales</h2>
		<h3>customers</h3>
	</div>
	<div class="customers">
		<a class="btn btn-primary col-md-2" href="add_custumers.php">toevoegen</a>
		<table class="table table-striped">
			<tr>
				<th>companyName</th>
				<th>address</th>
				<th>postcode</th>
				<th>residence</th>
				<th>telephonenumber</th>
				<th>email</th>
				<th>BRK</th>
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
					echo '<td>';
					if( $row['bkr_control'] == 1){
						echo "yes";
					}elseif ($row['bkr_control'] == 0) {
						echo "no";					}
					echo  '</td>';
					echo '<td> <a href="custumersEdit.php?customerNR=' . $row['customerNR'] . '">edit</td>';
					echo '<td> <a href="appointments.php?customerNR=' . $row['customerNR'] . '">Appointments</td>';
					echo "</tr>";
			}
		?>
	</table>
	
	</div>
</div>

<?php include '../templates/footer.php'; ?>
