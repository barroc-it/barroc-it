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
			<li><a class="active" href="deactivatedproject.php">Deactivated projects</a></li>
		</ul>
		<div class="searchitem">
			<form  method="post" action="search.php?go"  id="searchform"> 
				<input  type="text" class="form-control inputsearch" value="Search..." name="name"> 
				<input  type="submit" class="search-btn" name="submit" value""> 
			</form> 
		</div>		
		<button class="blue-btn"><a href="">ADD</a></button>
	</div>
</header>