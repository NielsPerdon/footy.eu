<?php
session_start();
mysqli_connect("localhsot", "root", "");
mysql_select_db("footy");

?>



<!DOCTYPE html>
<html>
<head> 

</head>
<body>
    <table align="center" style="padding:20px;">
        <form action="" method="POST">
            <th colspan="2">Admin Login</th>
            <tr>
                <td>Username:</td><td><input type="text" name="user"></td>
            </tr>
            <tr>
                <td>Password:</td><td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td colespan="2" align="right"><input type="submit" name="login" value="LOGIN"></td>
            </tr>
        </form>
    </table>
<?php
if(isset($_POST['login'])) {
    $username=$_POST['user'];
    $password=$_POST['pass'];

    $query="SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $run=mysql_query($query);

    if (mysql_num_rows($run)>0) {
        
    }
}
?>

</body>
</html>
