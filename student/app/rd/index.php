<?php include '../templates/header.php'; ?>

<div class="header">
	<h1>projects</h1>
</div>
<div class="projects" >
	<div class="container" >
		<table class="table">
			<thead>
				<tr>
					<th>project naam</th>
					<th>opdrachtgever</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sql ="SELECT ALL FROM projecten";

				 ?>
			</tbody>
			
		</table>
	</div>
</div>

<?php include '../templates/footer.php'; ?>