<?php 
	$mysqli = mysqli_connect('localhost', 'root', '', 'multi_login');

	if (isset($_SESSION['edit'])){

		unset($_SESSION['edit']);
	}

	// initialize variables
	$dag = "";
	$datum = "";
	$tijd = "";
	$tegenstander= "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$dag = $_POST['dag'];
		$tijd = $_POST['tijd'];
		$datum = $_POST['datum'];
		$tegenstander = $_POST['tegenstander'];

		mysqli_query($mysqli, "INSERT INTO wedstrijd (dag, tijd, datum, tegenstander) VALUES ('$dag', '$tijd', '$datum','$tegenstander')"); 
		$_SESSION['message'] = "Match saved"; 
	}

	if (isset($_POST['edit'])) {
		$dag = $_POST['dag'];
		$tijd = $_POST['tijd'];
		$datum = $_POST['datum'];
		$tegenstander = $_POST['tegenstander'];
		$id = $_POST['id'];

		mysqli_query($mysqli, "UPDATE wedstrijd SET dag='$dag', datum='$datum', tijd='$tijd', tegenstander='$tegenstander' WHERE id=$id"); 
		$_SESSION['message'] = " Edit saved"; 
		$_SESSION['edit'] = true; 
		header('Location:home.php');
	}

	if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		mysqli_query($mysqli, "DELETE FROM wedstrijd WHERE id=$id");
		$_SESSION['message'] = " match deleted"; 
		$_SESSION['edit'] = true; 
		header('Location:home.php');
	}