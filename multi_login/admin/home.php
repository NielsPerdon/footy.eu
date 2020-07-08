<?php 
include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../styling.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="../../img/voorwaarts.png" alt="logo"  >
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
                        <a href="home.php?logout='1'" style="color: red;">logout</a>
                        <br>
                       &nbsp; <a href="create_user.php" style="color: black;"> + add user</a>
					</small>
                   <form action="home.php" method="POST">
        <label>dag</label>
        <input type="text" name="dag" value="plaats dag"> <br>
        <label>tijd</label><br>
        <input type="time" name="tijd" value="plaats tijd"><br>
        <label>datum</label>
        <input type="date" name="datum" value="plaats datum"> <br>
        <label>tegenstander</label>
        <input type="text" name="tegenstander" value="plaats tegenstander"> <br>
    <button class="button alert alert-succes" type="submit" name="save" > bewaar </button>
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

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>