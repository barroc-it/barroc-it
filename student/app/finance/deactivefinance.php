<?php 
	include '../templates/header.php';
	require '../../config/config.php';
?>

<header>
	<div class="navibar">
		<ul class="navibarbutton">
			<li><a class="menutext" href="index.php">Home</a></li>
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
							echo '<td>' . $row['datum'] . '</td>';
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
	