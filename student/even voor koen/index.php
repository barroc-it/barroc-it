<?php 
include 'app/templates/header.php'; 
require 'app/database.php';
?>
<div class="container">



	<div class="page-header">
		<h1>Skype applicatie</h1>
	</div>

	 
	<table class="table table-striped">
		<tr>
			<th>name</th>
			<th>call</th>
			<th>chat</th>
			<th>delete</th>
		</tr>
		<?php 
			$sql = "SELECT * FROM contacten1";
			$query = mysqli_query($con, $sql);

			while ($row = mysqli_fetch_assoc($query)) {
				echo "<tr>";
					echo "<td>" . $row['naam'] . "</td>";
					echo '<td><a href="skype:' . $row['skype_id'] . '?call">call</a>';
					echo '<td><a href="skype:' . $row['skype_id'] . '?chat">chat</a>';
					echo '<td><a href="app/controllers/userController.php?id=' . $row['id'] .  '&delete=true">X</a>';
				echo "</tr>";
			}
		?>
	</table>


	<form action="app/controllers/userController.php" method="post" class="col-md-6 col-md-offset-3">
		<h2>Gebruiker-toevoegen</h2>
		<div class="form-group">
			<label for="username">username</label>
			<input class="form-control" type="text" name="username" >
		</div>
		<div class="form-group">
			<label for="skype-id">skype-id</label>
			<input class="form-control" type="text" name="skype_id" >
		</div>
		<div class="form-group">
			<input type="submit" value="toevoegen" name="createUser" class="btn btn-primary">
		</div>



	</form>
</div>


<?php include 'app/templates/footer.php'; ?>