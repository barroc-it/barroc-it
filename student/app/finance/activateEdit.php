<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 
    session_start();
if($_SESSION['login'] == 2) {  

} else {
header("location:../login.php");
}
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
                <label class="col-md-3" for="quintity">Quintity:</label>
                <input class="col-md-6" type="text"  class="form-control" name="quintity" id="quintity" value="<?php echo $row['quintity'] ?>">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="price">Price:</label>
                <input class="col-md-6" type="text"  class="form-control" name="price" id="price" value="<?php echo $row['price'] ?>">
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
if (isset($_POST['submit'])){
    $quintity = mysqli_real_escape_string($con,$_POST['quintity']);
    $price = mysqli_real_escape_string($con,$_POST['price']);
    $description = mysqli_real_escape_string($con,$_POST['description']);

    $sql  = "UPDATE invoices SET    quintity = '$quintity',
                                    price = '$price',
                                    description = '$description'
                             WHERE invoicesNR = $invoicesNR";

    if (!$query = mysqli_query($con, $sql)) {
        echo "update is niet goed gegaan";
        header('location:index.php');
    } else {
        header('location:activate.php?customerNR=' . $row['customerNR']);
    }
}
}
?>
</div>
		</form>
	</div>
 </div>

</body>
</html>