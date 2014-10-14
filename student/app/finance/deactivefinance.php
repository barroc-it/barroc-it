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
					<th>Deactivate</th>
				</tr>
			</thead>
					
				<tbody class="finance">
				<?php 
					if ( isset($_GET['invoicesNR']) ) {
					$invoicesNR= $_GET['invoicesNR'];
					$sql = "SELECT * FROM invoices WHERE invoicesNR = '$invoicesNR'";
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {

						echo '<tr>';
						echo '<td>' . $row['date'] . '</td>';
						echo '<td>' . $row['quintity'] . '</td>';
						echo '<td>' . $row['description'] . '</td>';
						echo '<td>' . $row['price'] . '</td>';
						echo '<td>' . $row['btw'] . '</td>';
						echo '<td>' . $row['amount'] . '</td>';
						echo '<td><a href="activateEdit.php">Edit</a></td>';
						echo '<td><a href="activate.php?invoicesNR=' . $row['invoicesNR'] . '">' ?><button class="edit-btn">Activate</button></a></td>
					<?php
						echo '</tr>';
				}
			}
						
					?>
			</tbody>
		</table>
	