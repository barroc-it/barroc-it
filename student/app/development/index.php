<?php 
session_start();
if($_SESSION['login'] == 3) {  
echo "you have successful logged in";

}
else
{
header("location:../login.php");
}
	include '../templates/header.php';
	require '../../config/config.php';
?>

<link rel="stylesheet" type="text/css" href="../assets/css/buttons.css">
<link rel="stylesheet" type="text/css" href="../assets/css/navimenu.css">
<style>
	* {
		margin-top: -12px;
	}
	body {
		min-width: 900px;
	}
</style>
<header>
	<div class="bannertext">
			<h1 class="text_1">BARROC IT.<br></h1>
			<h1 class="text_2">SOFTWARE FOR REAL</h1>
		</div>
	<div class="bannerimg">
	</div>
	<div class="navibar">
		<ul class="navibarbutton">
			<li><a class="active" href="index.php">Home</a></li>
			<li><a class="menutext" href="deactivatedproject.php">Deactivated projects</a></li>		
		</ul>
		<div class="searchitem">
			<form  method="post" action="search.php?go" id="searchform" name="search"> 
			    <input  type="text" class="form-control inputsearch" value="Search..." name="search"> 
			    <input  type="submit" class="search-btn" name="submit" value""> 
			</form> 
		</div>
		<button class="blue-btn"><a href="../controllers/developmentcontroller.php">ADD</a></button>
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
					<th>Saldo</th>
					<th>Limit</th>
				</tr>
			</thead>
					
			<tbody class="projects">
				<?php 
					$sql = "SELECT * FROM customers";
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {
						echo '<tr>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['companyName'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['contactPerson'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['openProjects'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['lastcontactDate'] . '</a></td>';
						echo '<td><a href="projecten.php?customerNR=' . $row['customerNR'] . '">' . $row['saldo'] . '</a></td>';
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