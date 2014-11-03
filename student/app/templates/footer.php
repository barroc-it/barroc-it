<?php
	require '../../config/config.php';
?>

<div class="footerclass">
	<form action="" method="POST" class="commentForm">
		<div class="form-group col-sm-12">
			<label for="name">Name</label>
			<input type="text" value='' class="form-control" name="name" id="name" maxlength="37">
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
		$datetime = date("Y-m-d H:i:s");
		$sql = "INSERT INTO comments (name, department, comment, datetime ) VALUES ('$name', '$department', '$comment', '$datetime')";
		
		if( $query = mysqli_query($con, $sql)) {
			header("location: ../sales/index.php"); 
		} else {
			echo "kan de query niet uitvoeren";
		}
	}

	$sql = "SELECT * FROM comments ORDER BY datetime DESC ";
	$query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query) > 0 ){
        while ($row = mysqli_fetch_assoc($query)){
           	echo '<div class="container">';
			echo '<table class="table tablewidth tablebottom">';
			echo '<thead><tr><th><h3>' . $row['name'] . ' has a comment:' . '<a href="deletecomment.php?id=' . $row['id'] . '">' ?><button class='del-btn' onclick="return confirm('Are you sure you want to delete this comment?');"></button></a> <?php echo '<span class="text-muted commentdate">' . $row['datetime'] . '</span></h3></th></tr></thead>';				
		?>
			<tr><td><b>Department:</b>
			<?php echo $row['department'] . '</td></tr>'; ?>
			<tr><td><b>Comment:</b><br>
			<?php echo $row['comment'] . '</td></tr>';
		}
    } else {
    	echo '<p class="nocomments">There are no comments</p>';
    }
?>
</div>
</body>
</html>