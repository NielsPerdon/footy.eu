<?php

session_start();


// Dit script blokkeert de toegang als je niet ingelogd bent.
// Zet bovenin de pagina
if(
	!isset($_SESSION['uid']) 
	or 
	!$_SESSION['uid']
){
	header('location: loginform.php');
	exit;
}

?>

Je bent blijkbaar ingelogd!