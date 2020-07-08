<?php 
    include('functions.php');
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
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
			<img src="../img/voorwaarts.png"  alt="logo">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

                <?php endif ?>
                <br>
                <br>
                <br>
                <br>
                <p> wedstrijden:</p>


                <?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "multi_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, dag, tegenstander, tijd, datum FROM wedstrijd";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " Dag: " . $row["dag"]. "<br>". " tegenstander: " . $row["tegenstander"]. "<br>". " tijd: " . $row["tijd"]. "<br>". " datum: " . $row["datum"]. "<br>"."<br>" ;
  }
} else {
  echo "0 results";
}
$conn->close();
?>


              
                
			</div>
		</div>
	</div>
</body>
</html>