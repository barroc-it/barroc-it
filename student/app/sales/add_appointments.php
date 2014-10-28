<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 

?>	



<div class="container">
	<div class="header">
		<h2>Add-appointments</h2>
	</div>
	<br>
	<div class="addCustumer">
		<form method="post" action="../controllers/appointmentscontroller.php" role="form" class="col-md-6">
		    <div class="form-group">
		        <label class="col-md-4" for="name">companyname</label>
		        <input class="col-md-2" type="text" id="name" name="name">
		    </div>
<br>
		    <div class="form-group">
		        <label class="col-md-4"for="datum">date</label>
		        <input class="col-md-2" type="date" id="datum" name="datum">
		    </div>
<br>
		    <div class="form-group">
		        <label class="col-md-4" for="description">Description</label>
		        <input class="col-md-2" type="text" id="description" name="description">
		    </div>
<br>
		<input type="submit" value="toevoegen" name="input_customer" class="btn btn-primary col-md-4">
		</form>
	</div>
 </div>