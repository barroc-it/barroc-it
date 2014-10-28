<?php require 'templates/header.php'; ?>
<style>
	body {
		background: url(assets/images/hoofdafbeelding.jpg) no-repeat center center fixed; 
	  	-webkit-background-size: cover;
	  	-moz-background-size: cover;
	  	-o-background-size: cover;
	  	background-size: cover;
    }
	h1 {
		display: none;
	}
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
	.btn {
		margin-top: 5px;
	}
	li {
		color: #444444;
		margin-top: -5px;
		margin-bottom: -5px;
	}
</style>
<div class="login">
	<div class="container">
		<form method="post" action="controllers/authcontroller.php" role="form" class="login-form col-md-4 col-md-offset-4">
			<fieldset>
				<div class="loginbackground">
				</div>
					<ul>
						<?php  
						// succes of fail message
						if (isset($_GET['msg'])) {
							echo '<li><b>' .  htmlspecialchars($_GET['msg']) . '</b></li>';
						}
						?>
					</ul>
				<legend class="borderline"><h2>Login</h2></legend>
						<div class="form-group">
							<label for="name">Username</label>
							<input type="text" name="name" id="name" class="form-control">	
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="authUser" value="Login" class="btn btn-sm">
						</div>
			</fieldset>
		</form>
	</div>
</div>

</body></html>