<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<img src="../img/voorwaarts.png" alt="logo"> 
	</div>
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Speler</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>wachtwoord</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			nog geen member? <a href="register.php">login</a>
		</p>
	</form>
</body>
</html>