<?php
	require '../../config/config.php';
?>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" type="text/css" href="http://bootswatch.com/paper/bootstrap.min.css">

<div class="footerclass">

	<form action="" method="POST" class="commentForm">
		<div class="form-group col-sm-12">
			<label for="name">Name</label>
			<input type="text" value='' class="form-control" name="name" id="name">
		</div>
		<div class="form-group col-sm-12">
			<label for="department">Department</label>
				<select name="departmentchoice" class="form-control">
					<option value="Sales">Sales</option>
					<option value="Finance">Finance</option>
					<option value="Development">Development</option>
				</select>
		</div>
		<div class="form-group col-sm-12">
			<label for="comment">comment</label>
			<textarea rows="2" cols="50" value='' class="form-control" name="comment" id="comment"></textarea>
		</div>
		<div class="form-group col-sm-12">
			<input name="submit" type="submit" value="Place comment" class="btn btn-primary">
		</div>
	</form>


	<?php

	if (isset($_POST['submit'] ) ) {
			
			$name = $_POST['name'];
			$department = $_POST['departmentchoice'];
			$comment = $_POST['comment'];
			$datetime = date('Y-m-d-h-s');
			$sql = "INSERT INTO comments (name, department, comment, datetime ) VALUES ('$name', '$department', '$comment', '$datetime')";
			
			if( $query = mysqli_query($con, $sql)) {
				header('location: #');
			} else {
				echo "kan de query niet uitvoeren";
			}
		}

		$sql = "SELECT * FROM comments ORDER BY datetime DESC ";
		$query = mysqli_query($con, $sql);

		while ($row = mysqli_fetch_assoc($query)) {
			echo '<div class="container">';
			echo '<table class="table tablewidth tablebottom">';

			echo '<thead><tr><th><h3>' . $row['name'] . ' has a comment:<span class="text-muted commentdate">' . $row['datetime'] . '</span></h3></th></tr></thead>';				
	?>

				<tr><td><b class ='col-md-2'>Department:</b><p class='col-md-2 col-md-offset-8'>delete</p>


				<?php echo $row['department'] . '</td></tr>'; ?>
				<tr><td><b>Comment:</b><br>
				<?php echo $row['comment'] . '</td></tr>';
				}
	?>
</div>

</body>
</html>