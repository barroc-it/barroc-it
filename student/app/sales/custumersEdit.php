<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 





	if ( isset($_GET['customerNR']) ) {
	$customerNR = $_GET['customerNR'];
	$sql = "SELECT * FROM customers WHERE customerNR = '$customerNR'";


	$query = mysqli_query($con, $sql);

			
			
while ($row = mysqli_fetch_assoc($query)){
?>

<form action="" method="post" class="col-md-6">
	<h2>edit customers</h2>
    <div class="form-group">
        <label for="companyName">companyName</label>
        <input value="<?php echo $row['companyName'] ?>" class="form-control" type="text" customerNR="companyName" name="companyName">
    </div>

    <div>
        <input type="submit" value="edit" name="edit_customer" class="btn btn-primary col-md-4">
    </div>
</form>
<?php 
}

}
if (isset($_POST['edit_customer'])){

    $companyName = mysqli_real_escape_string($con,$_POST['companyName']);

    

    $sql  = "UPDATE customers SET companyName = '$companyName'
                               WHERE customerNR = $customerNR";
    if(!$query = mysqli_query($con, $sql)){
        echo "update is niet goed gegaan";
    }else{
        header('location:index.php');
    }


}
?>
</div>


			
		</form>
	</div>
 </div>

<?php include '../templates/header.php' ?>
