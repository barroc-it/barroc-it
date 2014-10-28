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

<header>
	<div class="navibar">
		<ul>
			<li><a class="active" href="index.php">Home</a></li>
			<li><a class="menutext" href="deactivatedproject.php">Deactivated projects</a></li>		
		</ul>
		<div class="searchform">
			<form method="GET" action="indexsearch.php" name="search"> 
			    <input type="text" class="form-control" placeholder="Search..." name="search">    
				<input type="submit" class="search-btn">
			</form>
		</div>
		<a class="btn btn-info col-md-2 col-md-offset-2 btn-sm" href="logout.php">logout</a>
	</div>
</header>
	<div class="container">
		<h1>Customers</h1>
		<table class="table table-striped">
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
					$sql = "SELECT * FROM customers ORDER BY balance ASC ";
					$query = mysqli_query($con, $sql);
					

					while ($row = mysqli_fetch_assoc($query)) {
						echo '<tr>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['companyName'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['contactPerson'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['openProjects'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['lastcontactDate'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['balance'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['limit'] . '</a></td>';
						echo '</tr>';
						}
					?>
			</tbody>		
		</table>
		<a class="btn btn-primary col-md-2" href="addcustomer.php">toevoegen</a>
	</div>
		
<?php 
	include '../templates/footer.php'; 
?>