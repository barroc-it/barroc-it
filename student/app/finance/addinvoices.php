<?php 
// 	include '../templates/header.php';
// 	require '../../config/config.php';
//     session_start();
// if($_SESSION['login'] == 2) {  
// } else {
// header("location:../login.php");
// }
//     $customerNR = $_GET['customerNR'];
//     $sql = "SELECT * FROM invoices WHERE customerNR = '$customerNR' ";
//     $query = mysqli_query($con, $sql);

// while ($row = mysqli_fetch_assoc($query)) {
//     $customerNR = $_GET['customerNR'];
	
// 	if (isset($_POST['add_invoices'] ) ) {
// 		$datum = mysqli_real_escape_string($con, $_POST['datum']);
//      $projectNR = mysqli_real_escape_string($con, $_POST['projectNR']);
//      $btw = mysqli_real_escape_string($con, $_POST['btw']);
//      $active = mysqli_real_escape_string($con, $_POST['active']);
// 		$quintity = mysqli_real_escape_string($con, $_POST['quintity']);
// 		$price = mysqli_real_escape_string($con, $_POST['price']);
// 		$description = mysqli_real_escape_string($con, $_POST['description']);
		
// 		$sql = "INSERT INTO invoices (datum,  projectNR, btw, active,  quintity, price, description)
// 		VALUES ('$datum', '$projectNR', '$btw', '$active', $quintity', '$price', '$description')";
// 		$query = mysqli_query($con, $sql);

// 		if(!$query) {
// 			$msg = urlencode(trigger_error('Not able to add invoice' . $sql));
// 			header('location: index.php'. $msg);
// 		}
// 		$msg = urlencode('Invoice added');
// 		header ('location:activate.php?customerNR='.$customerNR);
// 		}
// }
?>
	<!-- <div class="container">
        <div class="page-header">
            <h1>Add Invoice</h1>
        </div>
        <form action="" method="POST" class="editform"> 
            <div class="form-group col-md-8">
                <label class="col-md-3" for="datum">Datum:</label>
                <input class="col-md-6" type="text"  class="form-control" name="datum" id="datum" placeholder="0000-00-00">
            </div>
              <div class="form-group col-md-8">
                <label class="col-md-3" for="projectNR">ProjectNR:</label>
                <input class="col-md-6" type="text"  class="form-control" name="projectNR" id="projectNR">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="quintity">Quantity:</label>
                <input class="col-md-6" type="text"  class="form-control" name="quintity" id="quintity">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="price">Price:</label>
                <input class="col-md-6" type="text"  class="form-control" name="price" id="price">
            </div>
              <div class="form-group col-md-8">
                <label class="col-md-3" for="btw">BTW:</label>
                <input class="col-md-6" type="text"  class="form-control" name="btw" id="btw" >
            </div>
              <div class="form-group col-md-8">
                <label class="col-md-3" for="active">Active:</label>
                <input class="col-md-6" type="text"  class="form-control" name="active" id="active" >
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="description">Description:</label>
                <input class="col-md-6" type="text"  class="form-control" name="description" id="description">
            </div>
            <div class="form-group col-md-8">	
                <input name="add_invoices" type="submit" value="Add invoice" class="btn btn-primary">
            </div>
        </form>
    </div> -->

    <?php 
    include '../templates/header.php';
    require '../../config/config.php';

    session_start();
    if($_SESSION['login'] == 2) {  
    } else {
        header("location:../login.php");
    }

    $customerNR = $_GET['customerNR'];
    
    if (isset($_POST['submit'] ) ) {
        $datum = mysqli_real_escape_string($con, $_POST['datum']);
        $projectNR = mysqli_real_escape_string($con, $_POST['projectNR']);
        $quintity = mysqli_real_escape_string($con, $_POST['quintity']);
        $price = mysqli_real_escape_string($con, $_POST['price']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
           
        $sql = "INSERT INTO invoices (customerNR, datum, projectNR, btw, active, quintity, price, description)
        VALUES ('$customerNR' '$datum', '$projectNR', 21, 1, $quintity', '$price', '$description')";
        $query = mysqli_query($con, $sql);

        if($query) {      
            header('location: projecten.php?customerNR=' . $customerNR);
        } else {
            
        }
    }
    ?>

    <div class="container">
        <div class="page-header">
            <h1>Add Invoices</h1>
        </div>
        <form action="" method="POST" class="editform"> 
            <div class="form-group col-md-8">
                <label class="col-md-3" for="datum">Datum:</label>
                <input class="col-md-6" type="text"  class="form-control" name="datum" id="datum" placeholder="0000-00-00">
            </div>
              <div class="form-group col-md-8">
                <label class="col-md-3" for="projectNR">ProjectNR:</label>
                <input class="col-md-6" type="text"  class="form-control" name="projectNR" id="projectNR">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="quintity">Quantity:</label>
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
                <input name="submit" type="submit" value="Add invoice" class="btn btn-primary">
            </div>
        </form>
    </div>
