<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 

$invoicesNR = $_GET['invoicesNR'];
$sql = "SELECT * FROM invoices WHERE invoicesNR = '$invoicesNR'";
$query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($query)) {
?>
    <div class="container">
        <div class="page-header">
            <h1>Edit Invoice</h1>
        </div>
        <form action="" method="POST" class="editform"> 
            <div class="form-group col-md-8">
                <label class="col-md-3" for="datum">Datum:</label>
                <input class="col-md-6" type="text"  class="form-control" name="datum" id="datum" value="<?php echo $row['datum'] ?>">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="amount">Amount:</label>
                <input class="col-md-6" type="text"  class="form-control" name="amount" id="amount" value="<?php echo $row['amount'] ?>">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="paid">Paid:</label>
                <input class="col-md-6" type="text"  class="form-control" name="paid" id="paid" value="<?php echo $row['paid'] ?>">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="quintity">Quintity:</label>
                <input class="col-md-6" type="text"  class="form-control" name="quintity" id="quintity" value="<?php echo $row['quintity'] ?>">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="price">Price:</label>
                <input class="col-md-6" type="text"  class="form-control" name="price" id="price" value="<?php echo $row['price'] ?>">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="btw">BTW:</label>
                <input class="col-md-6" type="text"  class="form-control" name="btw" id="btw" value="<?php echo $row['btw'] ?>">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="description">Description:</label>
                <input class="col-md-6" type="text"  class="form-control" name="description" id="description" value="<?php echo $row['description'] ?>">
            </div>
            <div class="form-group col-md-8">
                <INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;" class="btn btn-primary">
                <input name="submit" type="submit" value="Edit Invoice" class="btn btn-primary">
            </div>
        </form>
    </div>
<?php 
}

if (isset($_POST['submit'])){
    $datum = mysqli_real_escape_string($con,$_POST['datum']);
    $amount = mysqli_real_escape_string($con,$_POST['amount']);
    $paid = mysqli_real_escape_string($con,$_POST['paid']);
    $quintity = mysqli_real_escape_string($con,$_POST['quintity']);
    $price = mysqli_real_escape_string($con,$_POST['price']);
    $btw = mysqli_real_escape_string($con,$_POST['btw']);
    $description = mysqli_real_escape_string($con,$_POST['description']);

    $sql  = "UPDATE invoices SET    datum = '$datum',
                                    amount = '$amount',
                                    paid = '$paid',
                                    quintity = '$quintity',
                                    price = '$price',
                                    btw = '$btw',
                                    description = '$description'
                             WHERE projectNR = $projectNR";

    if (!$query = mysqli_query($con, $sql)) {
        echo "update is niet goed gegaan";
    } else {
        header('location:index.php');
    }
}
?>
</div>
		</form>
	</div>
 </div>

</body>
</html>