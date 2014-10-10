<?php 
	include '../templates/header.php';
	require '../../config/config.php';
?>

<link rel="stylesheet" type="text/css" href="../assets/css/buttons.css">
<style>
	* {
		margin-top: -12px;
	}
	body {
		min-width: 900px;
	}
	.bannerimg {
		background-image: url(../assets/images/banner.png);
		height: 300px;
		width: 100%;
	}
	.bannertext {
		position: absolute;
	}
	.bannertext h1 {
		text-shadow: 2px 2px 3px black;
		color: gray;
		line-height: 0.8em;
		font-size: 63px;
	}
	.text_1 {
		margin-top: 120px;
	}
	.navibar {
		height: 36px;
		width: 100%;
		border-bottom: 1px solid #e7e7e7;
	}
	.navibar li {
		float: left;
		list-style: none;
	}
	.navibarbutton {
		margin-top: 24px;
	}
	.menutext {
		list-style: none;
		padding: 11px 20px 5px 20px;
		text-shadow: 0.5px 0.5px 1px black;
		color: gray;
		text-decoration: none;
		font-size: 26px;
	}
	.active {
		list-style: none;
		padding: 11px 20px 5px 20px;
		border-bottom: 3px solid #2196F3;
		text-shadow: 0.5px 0.5px 1px black;
		color: gray;
		text-decoration: none;
		font-size: 26px;
	}
	.menutext:hover {
		list-style: none;
		padding: 11px 20px 5px 20px;
		border-bottom: 3px solid #2196F3;
		text-shadow: 0.5px 0.5px 1px black;
		color: gray;
		text-decoration: none;
	}
	.active:hover {
		list-style: none;
		padding: 11px 20px 5px 20px;
		color: gray;
		text-decoration: none;
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
			<li><a class="menutext" href="index.php">Home</a></li>
			<li><a class="menutext" href="deactivatedproject.php">Deactivated projects</a></li>		
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

<?php

	if ( isset($_GET['customerNR']) ) {
		
		$customerNR = $_GET['customerNR'];
		$sql = "SELECT * FROM projects";

		if (!$query = mysqli_query($con, $sql)) {
			echo '<a href="index.php"><button class="blue-btn2" style="font-size: 20px; height: 100px; width: 350px; float: left; margin-top: 10px; margin-left: 35%;">Kan selectie niet uitvoeren,<br>Klik hier om terug te gaan.</button></a>';
			die();
			}
		$row = mysqli_fetch_assoc($query);
		}

?>

<div class="container">
	<h1>Projects</h1> 
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Maintenance contract</th>
					<th>Software</th>
					<th>Hardware</th>
					<th>Prospect</th>
					<th>Deactivate</th>
				</tr>
			</thead>
			<tbody>
				<?php

					$sql = "SELECT * FROM projects WHERE customerNR = '$customerNR'";
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {
						echo '<tr>';
						echo '<td>' . $row['maintenance_contract'] . '</td>' ;
						echo '<td>' . $row['software'] . '</td>' ;
						echo '<td>' . $row['hardware'] . '</td>' ;
						echo '<td>' . $row['description'] . '</td>' ;
				?>
						<td><button class="warning-btn">Deactivate</button></td>
				<?php 						
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>