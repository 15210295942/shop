<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "123456";
$dbdatabase = "go4shop";
$config_basedir = "/";
$config_sitename = "Dating Coach";
@$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die(mysql_error());
@mysql_select_db($dbdatabase, $db) or die(mysql_error());

?>