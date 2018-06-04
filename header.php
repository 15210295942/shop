<?php
session_start();
if(isset($_SESSION['SESS_CHANGEID']) == TRUE)
{
session_unset();
session_regenerate_id();
}
require("config.php");

?>

<head>
<title><?php echo $config_sitename; ?></title>

<link href="css/stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="header">
<h1><?php echo $config_sitename; ?></h1>
</div>
<div id="menu">
<a href="<?php echo $config_basedir; ?>">Home</a> -
<a href="<?php echo $config_basedir;?>showcart.php">Shopping Cart</a>
</div>
<div id="container">
<div id="bar">
<?php
require("bar.php");
echo "<hr>";

if(isset($_SESSION['SESS_LOGGEDIN']) == TRUE)

{
    
echo "Welcome <strong>" . $_SESSION['SESS_USERNAME']. "</strong>[<a href='" . $config_basedir. "logout.php'>logout</a>]";

}

else{

echo "<a href='login.php'>Login</a>";
echo "<br><a href='register.php'>Register</a>";
}


if(@$_SESSION['SESS_ADMINLOGGEDIN'] == 1)

{

echo "[admin][admin logout]";
}
?>
    
</div>
<div id="main">
