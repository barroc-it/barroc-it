<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 

if (isset($_POST['editProject'])){


    $maintenance_contract = mysqli_real_escape_string($con,$_POST['maintenance_contract']);
    $software = mysqli_real_escape_string($con,$_POST['software']);
    $hardware = mysqli_real_escape_string($con,$_POST['hardware']);
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $customerNR = mysqli_real_escape_string($con,$_GET['customerNR']);




	if ( isset($_GET['customerNR']) ) {
	$customerNR = $_GET['customerNR'];
	$sql = "SELECT * FROM customers WHERE customerNR = '$customerNR'";


	$query = mysqli_query($con, $sql);

			
			
while ($row = mysqli_fetch_assoc($query)){
?>

<form action="" method="post" class="col-md-6">
	<h2>edit customers</h2>
	<br>
    <div class="form-group">
        <label class="col-md-4"for for="companyName">companyName</label>
        <input value="<?php echo $row['companyName'] ?>" class="col-md-8" type="text" customerNR="companyName" name="companyName">
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

    <div class="form-group">
        <label class="col-md-4"for="bkr_control">bkr_control</label>
        <input value="<?php echo $row['bkr_control'] ?>"class="col-md-3" type="text" id="bkr_control" name="bkr_control"> <p>0 for no and 1 for yes</p>
    </div>
    <div>
        <INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;">
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
    $bkr_control = mysqli_real_escape_string($con,$_POST['bkr_control']);

    

    $sql  = "UPDATE projects SET   maintenance_contract = '$maintenance_contract',
                                    software = '$software',
                                    hardware = '$hardware',
                                    description = '$description'


                               WHERE customerNR = $customerNR";
    if(!$query = mysqli_query($con, $sql)){
        echo "update is niet goed gegaan".mysqli_error($con);
    }else{
        header('location:index.php');
    }
}


}
?>
        <form action="projectEdit.php?customerNR=<?php echo addslashes($_GET['customerNR']); ?>" method="POST" > 
            <div class="form-group col-md-8">
                <label class="col-md-3" for="maintenance_contract">maintenance_contract</label>
                    <select name="maintenance_contract" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="software">software:</label>
                <input class="col-md-6" type="text"  class="form-control" name="software" id="software">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="hardware">hardware:</label>
                <input class="col-md-6" type="text"  class="form-control" name="hardware" id="hardware">
            </div>
            <div class="form-group col-md-8">
                <label class="col-md-3" for="description">Description:</label>
                <input class="col-md-6" type="text"  class="form-control" name="description" id="description">
            </div>
            <div class="form-group col-md-8">   
                <input name="editProject" type="submit" value="editProject" class="btn btn-primary">
            </div>
        </div>
    </form>





</body>
</html>