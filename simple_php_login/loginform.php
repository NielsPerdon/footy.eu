<?php

//echo password_hash('ikbenpeter',PASSWORD_DEFAULT);

include('logincheck.php');

if(isset($error)) { echo $error; }

?>
<form action="" method="post">
	<input type="text" name="gebruikersnaam" value="">
	<input type="password" name="gebruikerswachtwoord" value="">
	<input type="submit" name="bevestiging" value="Inloggen!">
</form>

