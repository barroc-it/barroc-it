<?php require 'templates/header.php'; ?>

<div class="login">
	<div class="container">
		<form method="post" action="controllers/authcontroller.php" role="form" class="login-form col-md-4 col-md-offset-4">
			<fieldset>
				<div class="loginbackground">
				</div>
				<legend class="borderline"><h2>Login</h2></legend>

					<ul>
						<?php  
						// succes of fail message
						if (isset($_GET['msg'])) {
							echo '<li>' .  htmlspecialchars($_GET['msg']) . '</li>';
						}
						?>
					</ul>

						<div class="form-group">
							<label for="name">Username</label>
							<input type="text" name="name" id="name" class="form-control">	
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="authUser" value="Login" class="btn btn-large">
						</div>
			</fieldset>
		</form>
	</div>
</div>

<?php require 'templates/footer.php'; ?>