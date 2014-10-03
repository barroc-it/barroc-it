<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Barroc-IT</title>
	<link rel="stylesheet" type="text/css" href="http://bootswatch.com/paper/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<script src="text/javascript"></script>
	<script type="../assets/jquery/jqueryoffline.js"></script>
	<script>
		$(document).ready(function(){
			$(".projectinfo").hide();
		  	$(".projects").click(function(){
		    $(".projectinfo").slideToggle();

		  });
		});
	</script>

</head>
<body>

