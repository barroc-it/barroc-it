<?php 
	include '../templates/header.php'; 
	require '../../config/config.php'; 

if (isset($_POST['editProject'])){

    $maintenance_contract = mysqli_real_escape_string($con,$_POST['maintenance_contract']);
    $software = mysqli_real_escape_string($con,$_POST['software']);
    $hardware = mysqli_real_escape_string($con,$_POST['hardware']);
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $customerNR = mysqli_real_escape_string($con,$_GET['customerNR']);
    

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