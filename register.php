<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dating Coach</title>
</head>
<body>
<?php
	require('config.php');
    $mysqli = new mysqli();
    $mysqli->connect('localhost', 'root','','go4shop');
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];
		$username = stripslashes($username);
		$username = mysql_real_escape_string($username);
		$email = stripslashes($email);
		$email = mysql_real_escape_string($email);
		$password = stripslashes($password);
		$password = mysql_real_escape_string($password);
		$trn_date = date_default_timezone_set("UTC");
        $query = "INSERT into `logins` (username, password,email) VALUES ('$username', '$password' ,'$email' )";

        $result = $mysqli->query($query);
        $last_id = mysqli_insert_id($mysqli);
        $sql = "update `logins` set customer_id =".$last_id ." where id = ".$last_id;
        $re  = $mysqli->query($sql);
        if($re){
            require('header.php');
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
require('header.php');      
?>

<h1>Register</h1>
Are you ready to take action and change your life forever? Then Sign up with us,  is completly free!
<p>
<form name="registration" action="" method="post">
<Table>
    <tr>
        <td>Username</td>
        <td><input type="text" name="username" required/><br></h3>
    </tr>
    <tr>    
        <td>Email</td>  
        <td><input type="email" name="email" required/><br>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="password" required/><br></h3>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Register"/>
    </tr>
</table>
</form>
</div>
<?php } ?>
</body>
</html>



<!--<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dating Coach</title>
</head>
<body>-->
<?php
// require('config.php');
// // If form submitted, insert values into the database.
// if (isset($_POST['username'])){
// $username = $_POST['username'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// $username = stripslashes($username);
// $username = mysql_real_escape_string($username);
// $email = stripslashes($email);
// $email = mysql_real_escape_string($email);
// $password = stripslashes($password);
// $password = mysql_real_escape_string($password);
// $trn_date = date("Y-m-d H:i:s");
// $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
// $result = mysql_query($query);
// if($result){
// echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
// }
// }else{
// require("header.php");
//?>
<!--<h1>Registration</h1>
Are you ready to take action and change your life forever? Then Sign up with us,  is completly free!
<p>
//<?php 
//if(isset($_POST['error'])) {
//echo "<strong>Incorrect username/password</strong>";
//}
//?>
<form action="//<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST">
<table>
<tr>
<td>Username</td>
<td><input type="textbox" name="userBox">
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="passBox">
</tr>
<tr>
<td>Email</td>
<td><input type="textbox" name="emailBox">
<td></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="regBox" value="Register">
</tr>
</table>
</form>    -->
<!--<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>-->
<?php 
//} 
//require("footer.php");
//?>
</body>
</html>
