<?php
// php scriptjes

session_start();


// Dit script blokkeert de toegang als je geen admin bent.
if(
	!isset($_SESSION['admin']) 
	or 
	$_SESSION['admin']==0
){
	header('location: loginform.php');
	exit;
}

?>

Je bent blijkbaar een admin!






