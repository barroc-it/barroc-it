<?php 
session_start();
if($_SESSION['login'] == 3) {  

}
else
{
header("location:../login.php");
}
	include '../templates/header.php';
	require '../../config/config.php';
?>

<style>
	body {
		min-width: 900px;
	}
</style>
<header>
	<div class="navibar">
		
		<ul class="navibarbutton">
			<li><a class="active" href="index.php">Home</a></li>
			<li><a class="menutext" href="deactivatedproject.php">Deactivated projects</a></li>		
		</ul>

		
	</div>
</header>

	<div class="container">
		<h1>Customers</h1>
		<br><br>
		<a class="btn btn-primary col-md-2" href="addcustomer.php">toevoegen</a>

		<form class="col-md-4 col-md-offset-2" method="GET" action="indexsearch.php" id="searchform" name="search"> 
		    <input id="search-bar" type="text" class="form-control inputsearch" placeholder="Search..." name="search"> 
		    <input type="submit" class="search-btn"> 
		</form> 

		<a class="btn btn-info col-md-2 col-md-offset-2" href="logout.php">logout</a>
		<table class="table table-striped sortable">
			<thead>
				<tr>
					<th>Company name</th>
					<th>Contact person</th>
					<th>Open projects</th>
					<th>Last contact date</th>
					<th>Balance</th>
					<th>Limit</th>
				</tr>
			</thead>
					
			<tbody class="projects">
				<?php 
					$sql = "SELECT * FROM customers WHERE bkr_control = 1 ORDER BY balance ASC ";
					$query = mysqli_query($con, $sql);
					

					while ($row = mysqli_fetch_assoc($query)) {
						echo '<tr>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['companyName'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['contactPerson'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['openProjects'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['lastcontactDate'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['balance'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['limiet'] . '</a></td>';
						echo '</tr>';
						}
					?>
			</tbody>		
		</table>
	</div>
		
<?php 
	include '../templates/footer.php'; 
?>