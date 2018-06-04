<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dating Coach</title>
</head>
<body>
<?php

require('config.php');
session_start();
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = stripslashes($username);
    $username = mysql_real_escape_string($username);
    $password = stripslashes($password);
    $password = mysql_real_escape_string($password);
    $query = "SELECT * FROM logins WHERE username='$username' and password='$password'";
	$result = mysql_query($query) or die(mysql_error());
	$rows = mysql_fetch_assoc($result);
    if($rows){

        $_SESSION['username'] = $username;
        // require_once("index.php");
        // header("Location: index.php");
        $_SESSION['SESS_LOGGEDIN'] = 1;
        $_SESSION['SESS_USERNAME'] = $rows['username'];
        $_SESSION['SESS_USERID'] = $rows['customer_id'];
        $ordersql = "SELECT id FROM orders WHERE customer_id = " . $_SESSION['SESS_USERID'] . " AND status <= 2";
        // echo $ordersql;die;
        $orderres = mysql_query($ordersql);
        $orderrow = mysql_fetch_assoc($orderres);
        // var_dump($orderrow);die;
        $_SESSION['SESS_ORDERNUM'] = $orderrow['id'];
        // session_register("SESS_LOGGEDIN");
        // session_register("SESS_USERNAME");
        // session_register("SESS_USERID");
        // session_register("SESS_ORDERNUM"); 
            // echo 11111111111;
        // var_dump($orderrow);die;
    // var_dump($_SESSION);die;
        // require_once("index.php");
        header("Location: index.php");
    }else{
        require('header.php');
    	echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
    }

}else{
    require("header.php");
?> 

<h1>Login</h1>
<form action="" method="post" name="login">
    <table>
    <tr>
        <td>Username</td>
            <td><input type="text" name="username" required/>
    </tr>
    <tr>
        <td>Password</td>
            <td><input type="password" name="password" required/>
    </tr>
    <tr>
        <td></td>    
            <td><input name="submit" type="submit" value="Login"/>
    </tr>
</form>
<p>Not registered yet? <a href='register.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>

