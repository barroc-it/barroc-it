<?php require 'templates/header.php'; ?>
<style>
	.loginbackground {
		background-color: black;
		position: absolute;
		margin-left: -20px;
		margin-top: -90px;
		width: 390px;
		height: 320px;
		z-index: -99;
		border-radius: 25px;
		opacity: 0.4;
    	filter: alpha(opacity=40);
	}
	.borderline {
		border-bottom: 0px solid #444444;
		text-align: center;
		color: #000000;
	}
	.form-group {
		color: #444444;
	}
	.form-control {
		color: #444444;
	}
</style>
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
							<label for="name">Email</label>
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