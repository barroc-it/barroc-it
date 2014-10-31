<?php 
session_start();
if($_SESSION['login'] == 2) {  

} else {
header("location:../login.php");
}
	
	include '../templates/header.php'; 
	require '../../config/config.php';
?>

<div class="navibar">
		<ul class="navibarbutton">
			<li><a class="active" href="index.php">Home</a></li>
			<li><a class="menutext" href="deactivefinance.php">Deactivated invoices</a></li>		
		</ul>
	<div class="searchform">
		<form method="GET" action="indexsearch.php" name="search"> 
			   <input type="text" class="form-control" placeholder="Search..." name="search">
		</form>
	</div>
		<input type="submit" class="searchbtn">
		<a class="btn btn-info col-md-2 col-md-offset-2 btn-sm" href="logout.php">logout</a>
</div>
	<div class="container">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Companyname</th>
					<th>Description</th>
					<th>Revenue ammount</th>
					<th>Limit</th>
					<th>Credit</th>
					<th>BKR</th>
					<th>View Activated Invoices</th>
					<th>Edit</th>
					<th>..</th>
				</tr>
			</thead>
					
			<tbody class="finance">
				<?php 
					
					$sql = "SELECT * FROM customers";
					$query = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($query)) {
						$id = $row['customerNR'];
						echo '<tr>';
						echo '<td>' . $row['companyName'] . '</td>';
						echo '<td>' . $row['description'] . '</td>';
						
						$revenueamount = "SELECT SUM(Amount) FROM invoices WHERE customerNR = $id" ;
						$revenue_amount = mysqli_query($con, $revenueamount);

						while($rows1 = mysqli_fetch_assoc($revenue_amount)) {
			                $revenueamount1 = implode("", $rows1);
			                echo '<td>€' . $revenueamount1 . ',-</td>';
			   				$uptdRev = "UPDATE customers SET salesAmount = $revenueamount1 WHERE customerNR = $id";
			   				mysqli_query($con, $uptdRev);
						}	
						echo '<td>'  . $row['maxAmount'] . '</td>';
						echo '<td>'  . $row['credit'] . '</td>';
						echo '<td>' . $row['bkr_control'] . '</td>';
		
						echo '<td><a href="activate.php?projectNR='.$row['customerNR']. '">View</a></td>';
						echo '<td><a href="editFinance.php?customerNR='.$row['customerNR'] . '">Edit</a></td>';	
					
					
					$amount = "SELECT SUM((salesAmount / maxAmount) * 100) AS amount FROM customers WHERE customerNR = '$id'";
					$r_amount = mysqli_query($con, $amount);

					while($rows3 = mysqli_fetch_assoc($r_amount)) {
			            $amount1 = implode("", $rows3);
			            $amount2 = number_format($amount1, 0, '.', '' . '');
			            $totalamount = 100 - $amount2;
			            if ($amount2 > 100) {
			               	echo '<td><span class"text-danger">Yes </span><button class="warning-btn">Deactivate</button></td>';
			            } else {
			               	echo '<td>€' . $row['maxAmount'] . ',-</td>';
			            }
			        }
			        	echo '<td><progress value="' . $amount2 . '" max="100"></progress>  ' . $totalamount .  '% left';
						echo '</tr>';
					
						
					
						}
						






						// $id = $row['projectNR'];
						// $sql1 = "SELECT SUM(amount) FROM invoices WHERE projectNR = '$id'";
						// $r_query = mysqli_query($con, $sql1);
						// while ($row1 = mysqli_fetch_assoc($r_query)) 
						// {
									
						// $implode = implode("", $row1);
						// echo $implode;	

						//  $insert = "UPDATE invoices SET amount  WHERE projectNR = '$id' LIMIT 1";
      //          			 $result = mysqli_query($con, $insert);

						// }				
			?>
		</tbody>
	</table>
		<a class="btn btn-primary col-md-2" href="add_custumers.php">toevoegen</a>
<?php 
	include '../templates/footer.php'; 
	?>