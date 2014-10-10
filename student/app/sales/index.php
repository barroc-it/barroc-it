<?php 
session_start();
if($_SESSION['login'] == 1) {  
echo "you have successful logged in";

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
		<a class="btn" href="logout.php">logout</a>
		
	</div>
	<div class="customers">
		<table class="table table-striped">
			
				<a href="add_custumers.php" class="btn">toevoegen</a>


			<br>
			<br>
		<tr>
			<th>companyName</th>
			<th>address</th>
			<th>postcode</th>
			<th>residence</th>
			<th>telephonenumber</th>
			<th>email</th>
			<th>edit</th>
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
					
				echo "</tr>";
			}
		?>




	</div>
</div>

<?php include '../templates/header.php'; ?>
