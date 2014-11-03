<?php 
session_start();
if($_SESSION['login'] == 3) {  

} else {
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
		</div>
				<input type="submit" class="searchbtn">
			</form>
		<a class="btn btn-info col-md-2 col-md-offset-2 btn-sm" href="logout.php">logout</a>
	</div>
</header>
	<div class="container">
		<div class="page-header">
			<h2>Development Cusomers</h2>
		</div>
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
							if ($row['balance'] > $row['maxAmount']) {
								echo '<td><span class="textdanger"><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['companyName'] . '</a></span></td>';
								echo '<td><span class="textdanger"><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['contactPerson'] . '</a></span></td>';
								echo '<td><span class="textdanger"><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['openProjects'] . '</a></span></td>';
								echo '<td><span class="textdanger"><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['lastcontactDate'] . '</a></span></td>';	
								echo '<td><span class="textdanger"><a href="projecten.php?customerNR=' . $row['customerNR'] . '">€' . $row['balance'] . ',-</a></span></td>';
								echo '<td><span class="textdanger"><a href="projecten.php?customerNR=' . $row['customerNR'] . '">€' . $row['maxAmount'] . ',-</a></span></td>';
							} else {
								echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['companyName'] . '</a></td>';
								echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['contactPerson'] . '</a></td>';
								echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['openProjects'] . '</a></td>';
								echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['lastcontactDate'] . '</a></td>';	
								echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">€' . $row['balance'] . ',-</a></td>';
								echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">€' . $row['maxAmount'] . ',-</a></td>';
							}
						echo '</tr>';
						}
					?>
			</tbody>		
		</table>
	</div>
		
<?php 
	include '../templates/footer.php'; 
?>