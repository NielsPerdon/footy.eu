<?php

// Toon leesbare errormeldingen.
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialiseer sessies.
session_start();

// Controleer met isset of een formulier verzonden is.
if(isset($_POST['gebruikersnaam'])){
	
	// Connectie met database.
	$db = new PDO(
		'mysql:host=localhost;dbname=loginvoorbeeld;charset=utf8',
		'root',
		'root'
	);
	
	
	// Probeer de gebruiker uit de database te halen aan de hand van de gebruikersnaam.	
	
	// Formuleer een vraag / query - we gebruiken limit omdat er maar 1 gebruiker kan zijn met die naam.
	$selectObject = $db->prepare("SELECT * FROM gebruikers WHERE naam=:paramGebruikersnaam LIMIT 1");
	
	// Om onze database te beschermen gebruiken we bindValue. 
	// Hiermee voegen we de gebruikersnaam toe aan de query.
	$selectObject->bindValue(":paramGebruikersnaam", $_POST['gebruikersnaam'], PDO::PARAM_STR);
	
	// Stuur de query naar de database.
	$selectObject->execute();
	
	// Haal 1 rij op of geef FALSE als er geen resultaat is gevonden.
	$gebruiker = $selectObject->fetch(PDO::FETCH_ASSOC);

	// Controleer of $gebruiker data bevat.
	if($gebruiker){
		
		// Gebruiker gevonden
		// Nu wachtwoord controleren.
		if(  password_verify($_POST['gebruikerswachtwoord'], $gebruiker['wachtwoord']) ){
			
			// Wachtwoord klopt.
			
			// Voeg de gebruikers ID en de admin rechten toe aan de session array.
			$_SESSION['uid'] = $gebruiker['uid'];
			$_SESSION['admin'] = $gebruiker['admin'];
			
			// Doorsturen naar een andere pagina.
			header('location: algemenepagina.php');
			exit;
		}
		
	}
	
	// Als de login goed was verlopen, hadden we niet op dit punt geweest 
	// omdat de header ons dan had doorgestuurd.
	// Er is dus iets mis.
	$error = 'Combinatie gebruikersnaam en wachtwoord onjuist';
	
}


