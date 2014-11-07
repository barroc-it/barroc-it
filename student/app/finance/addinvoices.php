<?php 
	include '../templates/header.php';
	require '../../config/config.php';

	$invoicesNR = $_GET['invoicesNR'];
    $sql = "SELECT * FROM invoices WHERE invoicesNR = '$invoicesNR' ";
    $query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $customerNR = $row['customerNR'];
	
	if (isset($_POST['add_invoices'] ) ) {
        $customerNR = mysqli_real_escape_string($con, $_POST['customerNR']);
        $projectNR = mysqli_real_escape_string($con, $_POST['projectNR']);
        $btw = mysqli_real_escape_string($con, $_POST['btw']);
		$datum = mysqli_real_escape_string($con, $_POST['datum']);
		$quintity = mysqli_real_escape_string($con, $_POST['quintity']);
		$price = mysqli_real_escape_string($con, $_POST['price']);
		$description = mysqli_real_escape_string($con, $_POST['description']);
        $active = mysqli_real_escape_string($con, $_POST['active']);
		
		$sql = "INSERT INTO invoices (customerNR, projectNR datum, btw, quintity, price, description, active)
		VALUES ('$customerNR', '$projectNR', '$datum', '$btw', $quintity', '$price', '$description', '$active')";
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
                <label class="col-md-3" for="customerNR">CustomerNR:</label>
                <input class="col-md-6" type="text"  class="form-control" name="customerNR" id="customerNR">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="projectNR">ProjectNR:</label>
                <input class="col-md-6" type="text"  class="form-control" name="projectNR" id="projectNR">
            </div>
              <div class="form-group col-md-8">
                <label class="col-md-3" for="btw">BTW:</label>
                <input class="col-md-6" type="text"  class="form-control" name="btw" id="btw">
            </div>
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
             <div class="form-group col-md-8">
                <label class="col-md-3" for="active">Active:</label>
                <input class="col-md-6" type="text"  class="form-control" name="active" id="active">
            </div>
            <div class="form-group col-md-8">
            	
                <input name="add_invoices" type="submit" value="Add Invoice" class="btn btn-primary">
            </div>
        </form>
    </div>