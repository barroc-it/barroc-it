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
			<h2>Development Customers</h2>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Company name</th>
					<th>Contact person</th>
					<th>Projects</th>
					<th>Limit</th>
					<th>Credit</th>
				</tr>
			</thead>			
			<tbody class="projects">
				<?php 
					$sql = "SELECT * FROM customers ";

					$query = mysqli_query($con, $sql);
					
					while ($row = mysqli_fetch_assoc($query)) {
							$id = $row['customerNR'];
						echo '<tr>';

									echo '<td><span class="textdanger"><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['companyName'] . '</a></span></td>';
								echo '<td><span class="textdanger"><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['contactPerson'] . '</a></span></td>';
							
								echo '<td><span class="textdanger"><a href="projecten.php?customerNR=' . $row['customerNR'] . '">€' . $row['credit'] . ',-</a></span></td>';
											
												$sql = $con->query("SELECT * FROM projects WHERE customerNR = '".$row['customerNR']."'");
								
							

								$amountProjects = mysqli_num_rows($sql);
									echo '<td>€'  . $row['maxAmount'] . ',-</td>';

					$limiet = $row['maxAmount'];
					$totaalbedrag = $row['salesAmount'];
					$credit1 = $limiet - $totaalbedrag;
					$credit2 = 0 - $credit1;

					if ($credit1 < 0) {
						echo '<td class="textdanger">-€'  . $credit2 . ',-</td>';
					} else {
					
					}
							
								
								
					
							}
						echo '</tr>';

					?>
			</tbody>		
		</table>
	</div>	
<?php 
	include '../templates/footer.php'; 
?>