<?php
	$search = mysqli_real_escape_string($con, $_GET['search']);
	$query = "SELECT * FROM customers WHERE"; 
?>


		<?php
		$search = trim($search);					
		if ($search){
			$query .= " CustomerNR = '". $search ."'
			OR CompanyName LIKE '%". $search ."%'
			OR ContactPerson LIKE '%". $search ."%'";
			$result = mysqli_query($con, $query);
			$row = mysqli_num_rows($result);
			
			if($row > 0){
				while ($row = mysqli_fetch_assoc($result)) {
				    echo '<tr>';
				    echo '<td>' . $row['CompanyName'] . '</td>';
				    echo '<td>' . $row['ContactPerson'] . '</td>';
				    echo '<td> <a class="btn btn-primary"href="activate.php?cid=' . $row['CustomerNR'] . '"</a>View</td>';
				    echo '<td> <a class="btn btn-primary"href="deactivate.php?cid=' . $row['CustomerNR'] . '"</a>View</td>'; 

				    $count = "SELECT COUNT(ProjectNR) FROM projects WHERE CustomerNR = '$i'";
					$r_count = mysqli_query($con, $count); 
					$i++;

			    	while($rows = mysqli_fetch_assoc($r_count))
					{
						$separater = implode(",", $rows);
						echo '<td>' . $separater . '</td>';
						echo '</tr>';
					}  
				}  
			}
		}							
		?>
		</tbody>
</table>
<div class='form-group'>
  	<a class='btn btn-default' href='index.php'>Back</a>
</div>