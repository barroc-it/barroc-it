<<?php 
	include '../templates/header.php';
	require '../../config/config.php';
?>

<style>
	* {
		margin-top: -12px;
	}
	body {
		min-width: 900px;
	}
</style>

<header>
	<div class="navibar">
		<ul class="navibarbutton">
			<li><a class="menutext" href="index.php">Home</a></li>
			<li><a class="menutext" href="deactivefinance.php">Deactivated invoices</a></li>		
		</ul>
		<div class="searchitem">
			<form  method="post" action="search.php?go" id="searchform" name="search"> 
			    <input  type="text" class="form-control inputsearch" value="Search..." name="search"> 
			    <input  type="submit" class="search-btn" name="submit" value""> 
			</form> 
		</div>
	</div>
</header>


<div class="container">
		<h1>Finance Deactivated invoices</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>amount</th>
					<th>paid</th>
					<th>quintity</th>
					<th>price</th>
					<th>BTW</th>
					<th>Description</th>
					<th>Edit</th>
					<th>Deactivate</th>
				</tr>
			</thead>
					
				<tbody class="finance">
				<?php 
					$sql = "SELECT * FROM invoices WHERE active = 1 ";
					$query = mysqli_query($con, $sql);

						while ($row = mysqli_fetch_assoc($query)) {
							echo '<tr>';
							echo '<td>' . $row['date'] . '</td>';
							echo '<td>' . $row['amount'] . '</td>';
							echo '<td>' . $row['paid'] . '</td>';
							echo '<td>' . $row['quintity'] . '</td>';
							echo '<td>' . $row['price'] . '</td>';
							echo '<td>' . $row['btw'] . '</td>';
							echo '<td><a href="activateEdit.php">Edit</a></td>';
							echo '<td><a href="activating.php?invoicesNR=' . $row['invoicesNR'] . '">' ?><button class="edit-btn">Activate</button></a></td>
				<?php
							echo '</tr>';
						}
						
				?>
			</tbody>
		</table>
	