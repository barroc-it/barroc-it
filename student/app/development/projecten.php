<style>
	* {
		margin-top: -12px;
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
		margin-top: 150px;
	}
	.navibar {
		height: 50px;
		width: 100%;
		border-bottom: 1px solid #e7e7e7;
	}
	.navibar li {
		float: left;
		list-style: none;
		font-size: 20px;
		margin-top: 0px;
	}
	.navibarbutton {
		
	}
	.menutext {
		list-style: none;
		padding: 11px 10px 13px 10px;
		font-size: 20px;
		margin-top: 0px;
		text-shadow: 0.5px 0.5px 1px black;
		color: gray;
		text-decoration: none;
	}
	.menutext:hover {
		list-style: none;
		padding: 11px 10px 7px 10px;
		font-size: 20px;
		margin-top: 0px;
		border-bottom: 5px solid #2196F3;
		text-shadow: 0.5px 0.5px 1px black;
		color: gray;
		text-decoration: none;
	}
	.active {
		list-style: none;
		padding: 11px 20px 7px 20px;
		font-size: 20px;
		margin-top: 0px;
		border-bottom: 5px solid #2196F3;
		text-shadow: 0.5px 0.5px 1px black;
		color: gray;
		text-decoration: none;
	}
	.active:hover {
		list-style: none;
		padding: 11px 20px 7px 20px;
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
			<li><a class="active" href="projecten.php">Projects</a></li>
			<li><a class="menutext" href="">Deactivated projects</a></li>
		</ul>
	</div>
</header>

<?php

	include '../templates/header.php'; 
	require '../../config/config.php';

	if ( isset($_GET['id']) ) {
		
		$id = $_GET['id'];
		$sql = "SELECT * FROM projects WHERE customerNR = '$id'";

		if (!$query = mysqli_query($con, $sql)) {
			echo 'Kan selectie niet uitvoeren';
			die();
			}
		$row = mysqli_fetch_assoc($query);
		} else {
			header('location: index.php');
		}

?>

<div class="container">
	<h1>Projects</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>CustomerNR</th>
					<th>Maintenance contract</th>
					<th>Software</th>
					<th>Hardware</th>
					<th>Prospect</th>
					<th>Deactivate</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {
						echo '<tr>';
						echo '<td>' . $row['customerNR'] . '</td>' ;
						echo '<td>' . $row['maintenance_contract'] . '</td>' ;
						echo '<td>' . $row['software'] . '</td>' ;
						echo '<td>' . $row['hardware'] . '</td>' ;
						echo '<td>' . $row['description'] . '</td>' ;
						?>
						<td><button>Deactivate</button></td>
						<?php 						
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>