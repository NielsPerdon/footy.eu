<?php include('../functions.php') ?>



<!DOCTYPE html>
<html>
<head>
	<title>crud match</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<form action="match.php" method="POST">
        <label>dag</label>
        <input type="text" name="dag" value="plaats dag"> 
        <label>tijd</label>
        <input type="time" name="tijd" value="plaats tijd"> <br><br><br><br><br>
        <label>datum</label>
        <input type="date" name="datum" value="plaats datum"> 
        <label>tegenstander</label>
        <input type="text" name="tegenstander" value="plaats tegenstander"> 
    <button type="submit" name="save"> save </button>
    </form>

<?php 
if (isset($_POST['save'])){
    $dag = $_POST['dag']; 
    $tijd = $_POST['tijd'];
    $datum = $_POST['datum'];
    $tegenstander = $_POST['tegenstander'];


    $mysqli->query("INSERT INTO wedstrijd (dag, tijd, datum, tegenstander) VALUES ('$dag', '$tijd', '$datum','$tegenstander')") or die($mysqli->error);
}

?>
</body>
