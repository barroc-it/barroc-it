<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 

?>	



<div class="container">
	<div class="header">
		<h2>Add-custumers</h2>
	</div>
	<br>
	<div class="addCustumer">
		<form method="post" action="../controllers/usersController.php" role="form" class="col-md-6">
		    <div class="form-group">
		        <label class="col-md-4" for="companyName">companyName</label>
		        <input class="col-md-2" type="text" id="companyName" name="companyName">
		    </div>
<br>
		    <div class="form-group">
		        <label class="col-md-4"for="address">address</label>
		        <input class="col-md-2" type="text" id="address" name="address">
		    </div>
<br>
		    <div class="form-group">
		        <label class="col-md-4" for="postcode">postcode</label>
		        <input class="col-md-2" type="text" id="postcode" name="postcode">
		    </div>
<br>
		    <div class="form-group">
		        <label class="col-md-4" for="residence">residence</label>
		        <input class="col-md-2" type="text" id="residence" name="residence">
		    </div>
<br>
		    <div class="form-group">
		        <label class="col-md-4" for="telephoneNumber">telephoneNumber</label>
		        <input class="col-md-2" type="text" id="telephoneNumber" name="telephoneNumber">
		    </div>
<br>	
		    <div class="form-group">
		        <label class="col-md-4"for="email">email</label>
		        <input class="col-md-2" type="email" id="email" name="email">
		    </div>
<br>
<br>




			<input type="submit" value="toevoegen" name="input_customer" class="btn btn-primary col-md-4">
		</form>
	</div>
 </div>