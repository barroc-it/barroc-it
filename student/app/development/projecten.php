<?php 
	include '../templates/header.php';
	require '../../config/config.php';
	session_start();
if($_SESSION['login'] == 3) {  
} else {
header("location:../login.php");
}
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

<?php
	if ( isset($_GET['customerNR']) ) {
		$customerNR = $_GET['customerNR'];
		$sql = "SELECT * FROM customers WHERE customerNR = '$customerNR' ";

		if (!$query = mysqli_query($con, $sql)) {
			echo '<a href="index.php"><button>Kan selectie niet uitvoeren, Klik hier om terug te gaan.</button></a>';
			die();
			}
		$row = mysqli_fetch_assoc($query);
		}
?>

<div class="container">
	<div class="page-header">
		<h2>Projects</h2>
	</div> 
		<table class="table table-striped">
			<a class="btn btn-primary " href="addProject.php?customerNR=<?php echo $customerNR ?>">Add Project</a>
			<thead>
				<tr>
					<th>Maintenance contract</th>
					<th>Software</th>
					<th>Hardware</th>
					<th>Description</th>
					<th>Deactivate</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT * FROM projects WHERE active = 0 AND customerNR = '$customerNR' " ;
					$query = mysqli_query($con, $sql);
					$maintenance_contract = "SELECT maintenance_contract FROM projects";

						while ($row = mysqli_fetch_assoc($query)) {
							echo '<tr>';
							echo "<td>" . ( $row['maintenance_contract'] == 1 ? 'yes' : 'no' ). "</td>";
							echo '<td>' . $row['software'] . '</td>' ;
							echo '<td>' . $row['hardware'] . '</td>' ;
							echo '<td>' . $row['description'] . '</td>' ;
					 		echo '<td><a class=" btn btn-danger" href="deactivate.php?projectNR=' . $row['projectNR'] . '">deactivate</td>';
					 		echo '<td><a class="btn btn-primary" href="projectEdit.php?projectNR=' . $row['projectNR'] . '&customerNR=' . $row['customerNR'] .'">edit</td>'; 						
							echo '</tr>';
						} 	
				?>
			</tbody>
		</table>

		
		

	</div>
<?php include '../templates/footer.php'; ?>
