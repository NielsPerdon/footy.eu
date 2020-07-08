<?php 
include('../functions.php');
require('server.php');


 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($mysqli, "SELECT * FROM wedstrijd WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$dag = $n['dag'];
            $datum = $n['datum'];
            $tijd = $n['tijd'];
			$tegenstander = $n['tegenstander'];
		}
	}


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

<!-- notification message -->
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
            echo $_SESSION['message']; 
            if (!isset($_SESSION['edit'])):            
            unset($_SESSION['message']);
            endif;
		?>
	</div>
<?php endif ?>

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
                    



                    <?php $results = mysqli_query($mysqli, "SELECT * FROM wedstrijd"); ?>

<table>
	<thead>
		<tr>
			<th>dag</th>
            <th>datum</th>
            <th>tijd</th>
			<th>tegenstander</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['dag']; ?></td>
            <td><?php echo $row['datum']; ?></td>
            <td><?php echo $row['tijd']; ?></td>
			<td><?php echo $row['tegenstander']; ?></td>
			<td>
				<a href="home.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?delete=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>




    

                    <form method="post" action="home.php" >
		<div class="input-group">
			<label>Dag</label>
			<input type="text" name="dag" value="">
		</div>
		<div class="input-group">
			<label>Tijd</label>
			<input type="time" name="tijd" value="">
        </div>
        <div class="input-group">
			<label>datum</label>
			<input type="date" name="datum" value="">
		</div>
		<div class="input-group">
			<label>tegenstander</label>
			<input type="text" name="tegenstander" value="">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="save" >Save</button>
        </div>
    </form>

    <?php if (isset($_GET['edit'])) { ?>
        
    <form method="post">
        <input  type="hidden" name="id" value="<?php echo $id; ?>">


        <input type="text" name="dag" value="<?php echo $dag; ?>">
        <input type="text" name="datum" value="<?php echo $datum; ?>">
        <input type="text" name="tijd" value="<?php echo $tijd; ?>">
        <input type="text" name="tegenstander" value="<?php echo $tegenstander; ?>">

        <button class="btn" type="submit" name="edit" >edit</button>
    </form>
 <?php } ?>

<?php endif ?>


			</div>
		</div>
	</div>
</body>
</html>