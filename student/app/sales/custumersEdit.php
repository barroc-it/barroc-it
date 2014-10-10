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



		    <div class="form-group">
		        <label class="col-md-4"for="address">address</label>
		        <input value="<?php echo $row['address'] ?>"class="col-md-8" type="text" id="address" name="address">
		    </div>

		    <div class="form-group">
		        <label class="col-md-4" for="postcode">postcode</label>
		        <input value="<?php echo $row['postcode'] ?>"class="col-md-8" type="text" id="postcode" name="postcode">
		    </div>

		    <div class="form-group">
		        <label class="col-md-4" for="residence">residence</label>
		        <input value="<?php echo $row['residence'] ?>"class="col-md-8" type="text" id="residence" name="residence">
		    </div>

		    <div class="form-group">
		        <label class="col-md-4" for="telephoneNumber">telephoneNumber</label>
		        <input value="<?php echo $row['telephoneNumber'] ?>"class="col-md-8" type="text" id="telephoneNumber" name="telephoneNumber">
		    </div>
	
		    <div class="form-group">
		        <label class="col-md-4"for="email">email</label>
		        <input value="<?php echo $row['email'] ?>"class="col-md-8" type="email" id="email" name="email">
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
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $postcode = mysqli_real_escape_string($con,$_POST['postcode']);
    $residence = mysqli_real_escape_string($con,$_POST['residence']);
    $telephoneNumber = mysqli_real_escape_string($con,$_POST['telephoneNumber']);
    $email = mysqli_real_escape_string($con,$_POST['email']);

    

    $sql  = "UPDATE customers SET 	companyName = '$companyName',
									address = '$address',
									postcode = '$postcode',
									residence = '$residence',
									telephoneNumber = '$telephoneNumber',
									email = '$email'

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

<?php include '../templates/footer.php' ?>
