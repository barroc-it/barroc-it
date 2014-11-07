<?php 
	include '../templates/header.php';
	require '../../config/config.php';

	$invoicesNR = $_GET['invoicesNR'];
    $sql = "SELECT * FROM invoices WHERE invoicesNR = '$invoicesNR' ";
    $customerNR = mysqli_query($con, "SELECT customerNR FROM invoices");
    $query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($query)) {
	
	if (isset($_POST['AddInvoice'] ) ) {
		$datum = mysqli_real_escape_string($con, $_POST['datum']);
		$quintity = mysqli_real_escape_string($con, $_POST['quintity']);
		$price = mysqli_real_escape_string($con, $_POST['price']);
		$description = mysqli_real_escape_string($con, $_POST['description']);
		
		$sql = "INSERT INTO invoices (datum, quintity, price, description)
		VALUES ('$datum', $quintity', '$price', '$description')";
		$query = mysqli_query($con, $sql);

		if(!$query) {
			$msg = urlencode(trigger_error('Project toevoegen is mislukt' . $sql));
			header('location: activate.php?customerNR=' . $customerNR  . $msg);
		}
		$msg = urlencode('project is succesvol toegevoegd');
		header ('location:activate.php?customerNR='.$customerNR);
		}
}
?>
	<div class="container">
        <div class="page-header">
            <h1>Add Invoice</h1>
        </div>
        <form action="" method="post" class="editform"> 
            <div class="form-group col-md-8">
                <label class="col-md-3" for="datum">Datum:</label>
                <input class="col-md-6" type="text"  class="form-control" name="datum" id="datum" placeholder="0000-00-00">
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
                <label class="col-md-3" for="description">Description:</label>
                <input class="col-md-6" type="text"  class="form-control" name="description" id="description">
            </div>     	
                <input name="add_invoices" type="submit" value="AddInvoice" class="btn btn-primary">
            </div>
        </form>
    </div>