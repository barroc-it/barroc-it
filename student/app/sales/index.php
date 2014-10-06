<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 
?>
<div class="container">
	<div class="page-header">
		<h2>sales</h2>
		<h3>customers</h3>
		
	</div>
	<div class="customers">
		<table class="table table-striped">
			<input type="input_customer" value="toevoegen	" name="input_customers" class="btn btn-primary col-md-2 col-md-offset-10">
		<tr>
			<th>companyName</th>
			<th>address</th>
			<th>postcode</th>
			<th>residence</th>
			<th>telephonenumber</th>
			<th>email</th>
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
					
				echo "</tr>";
			}
		?>




	</div>
</div>

<?php include '../templates/header.php'; ?>
