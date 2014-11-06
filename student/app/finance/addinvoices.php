<?php 
	include '../templates/header.php';
	require '../../config/config.php';

	$invoicesNR = $_GET['invoicesNR'];
	
	if (isset($_POST['submit'] ) ) {
		$datum = mysqli_real_escape_string($con, $_POST['datum']);
		$amount = mysqli_real_escape_string($con, $_POST['amount']);
		$paid = mysqli_real_escape_string($con, $_POST['paid']);
		$quintity = mysqli_real_escape_string($con, $_POST['quintity']);
		$price = mysqli_real_escape_string($con, $_POST['price']);
		$btw = mysqli_real_escape_string($con, $_POST['btw']);
		$description = mysqli_real_escape_string($con, $_POST['description']);
		
		$sql = "INSERT INTO invoices (projectNR, datum, amount, paid, quintity, price, btw, description)
		VALUES ('$projectNR','$datum', '$amount', '$paid', '$quintity', '$price', '$btw', '$description')";
		$query = mysqli_query($con, $sql);

		if(!$query) {
			$msg = urlencode(trigger_error('Project toevoegen is mislukt' . $sql));
			header('location: activate.php?projectNR=' . $projectNR . '&' . $msg);
		}
		$msg = urlencode('project is succesvol toegevoegd');
		header ('location:activate.php?projectNR='.$projectNR);
		}

	$sql = "SELECT * FROM invoices WHERE invoicesNR = '$invoicesNR'";
	$query = mysqli_query($con, $sql);
		
while ($row = mysqli_fetch_assoc($query)) {
?>
	<div class="container">
        <div class="page-header">
            <h1>Add Invoice</h1>
        </div>
        <form action="" method="POST" class="editform"> 
            <div class="form-group col-md-8">
                <label class="col-md-3" for="datum">Datum:</label>
                <input class="col-md-6" type="text"  class="form-control" name="datum" id="datum" placeholder="0000-00-00">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="amount">Amount:</label>
                <input class="col-md-6" type="text"  class="form-control" name="amount" id="amount">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="paid">Paid:</label>
                <input class="col-md-6" type="text"  class="form-control" name="paid" id="paid">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="quintity">Quintity:</label>
                <input class="col-md-6" type="text"  class="form-control" name="quintity" id="quintity">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="price">Price:</label>
                <input class="col-md-6" type="text"  class="form-control" name="price" id="price">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="btw">BTW:</label>
                <input class="col-md-6" type="text"  class="form-control" name="btw" id="btw">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="description">Description:</label>
                <input class="col-md-6" type="text"  class="form-control" name="description" id="description">
            </div>
            <div class="form-group col-md-8">
            	<INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;" class="btn btn-primary">
                <input name="submit" type="submit" value="Add Invoice" class="btn btn-primary">
            </div>
        </form>
    </div>
<?php
}
?>