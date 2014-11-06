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
	</div>
			<input type="submit" class="searchbtn">
		</form>
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
					<th>Past limit?</th>
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
						echo '<td>€'  . $row['maxAmount'] . ',-</td>';

					$limiet = $row['maxAmount'];
					$totaalbedrag = $row['salesAmount'];
					$credit1 = $limiet - $totaalbedrag;
					$credit2 = 0 - $credit1;

					if ($credit1 < 0) {
						echo '<td class="textdanger">-€'  . $credit2 . ',-</td>';
					} else {
						echo '<td>€'  . $credit1 . ',-</td>'; 
					}
					if ($row['bkr_control'] == 1) {
						echo '<td>Yes</td>';
					} else {
						echo '<td>No</td>';
					}
						echo '<td><a href="activate.php?customerNR='.$row['customerNR']. '">View</a></td>';
						echo '<td><a href="editFinance.php?customerNR='.$row['customerNR'] . '">Edit</a></td>';	
					
					$amount = "SELECT SUM((salesAmount / maxAmount) * 100) AS amount FROM customers WHERE customerNR = '$id'";
					$r_amount = mysqli_query($con, $amount);
					while($rows3 = mysqli_fetch_assoc($r_amount)) {
			            $amount1 = implode(" ", $rows3);
			            var_dump($amount1);
			            $amount2 = number_format($amount1, 0);
			            $totalamount = 100 - $amount2;
			            $maxAmount = $row['maxAmount'];
			          
			            if ($amount2 > 100) {
			               	echo '<td><span class"text-danger">Yes </span><a href="deactivefinance.php"><button class="warning-btn">Deactivate</button></a></td>';
			            } elseif ($maxAmount == 0 ) {
			            	echo '<td>No project</td>';
			            } else {
			               	echo '<td><span><progress value="' . $amount2 . '" max="100"></progress></span> ' . $totalamount .  '% left</td>';
			            }
			            
			        }	
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
		<a class="btn btn-primary col-md-2" href="add_custumers.php">toevoegen</a><br>
<?php 
	include '../templates/footer.php'; 
	?>