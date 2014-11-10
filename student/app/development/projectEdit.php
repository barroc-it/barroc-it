<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 
    session_start();
if($_SESSION['login'] == 3) {  
} else {
header("location:../login.php");
}

if (isset($_POST['editProject'])){
    $maintenance_contract = mysqli_real_escape_string($con,$_POST['maintenance_contract']);
    $software = mysqli_real_escape_string($con,$_POST['software']);
    $hardware = mysqli_real_escape_string($con,$_POST['hardware']);
    $description = mysqli_real_escape_string($con,$_POST['description']);

    $projectNR = mysqli_real_escape_string($con,$_GET['projectNR']);
    $customerNR = mysqli_real_escape_string($con,$_GET['customerNR']);


	if ( isset($_GET['customerNR']) ) {
	$customerNR = $_GET['customerNR'];
	$sql = "SELECT * FROM customers WHERE customerNR = '$customerNR'";
	$query = mysqli_query($con, $sql);

	
while ($row = mysqli_fetch_assoc($query)){



    $sql  = "UPDATE projects SET   maintenance_contract = '$maintenance_contract',
                                    software = '$software',
                                    hardware = '$hardware',
                                    description = '$description'


                               WHERE projectNR = $projectNR";
    if(!$query = mysqli_query($con, $sql)){
        echo "update is niet goed gegaan".mysqli_error($con);
    }else{
        header('location:projecten.php?customerNR='. $customerNR);
    }
}
}
}

?>
        <form action="projectEdit.php?customerNR=<?php echo $_GET['customerNR'] . '&projectNR=' . $_GET['projectNR'] ?>" method="POST" > 
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